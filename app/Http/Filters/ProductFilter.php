<?php

namespace App\Http\Filters;

use App\Models\Product;

class ProductFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'category_id',
        'sub_category_id',
        'selected_id',
        'text',
        'stock_more_than',
        'stock_less_than',
        'min_price',
        'max_price',
        'sort',
        'availability'
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('name', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given category id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function categoryId($value)
    {
        if (!$value) {
            return $this->builder;
        }

        return $this->builder->where(function ($query) use ($value) {
            $query->where('category_id', $value)
                ->orWhere('sub_category_id', $value)
                ->orWhere('sub_category_id2', $value)
                ->orWhereHas('categoryProducts', function ($q) use ($value) {
                    $q->where('category_id', $value)
                        ->orWhere('sub_category_id', $value)
                        ->orWhere('sub_category_id2', $value);
                });
        });
    }


    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selectedId($value)
    {
        if ($value) {
            $this->builder->sortingByIds($value);
        }

        return $this->builder;
    }

    public function text($value)
    {
        if (!$value) {
            return $this->builder;
        }

        $value = preg_replace('/\s+/', ' ', trim($value));

        return $this->builder->whereHas('translations', function ($query) use ($value) {
            $query->whereRaw("MATCH(name, description) AGAINST (? IN BOOLEAN MODE)", [$value]);
        });
    }



    /**
     * تطبيق التصحيحات للأخطاء الإملائية والحروف المشابهة
     */
    /**
     * تطبيق التصحيحات للأخطاء الإملائية باستخدام قاعدة بيانات.
     */
    private function applyCorrections($value)
    {
        // جلب قائمة الكلمات الصحيحة من قاعدة البيانات
        $correctWords = Product::withTranslation()->get()->pluck('name')->toArray();

        // تحويل الكلمة المدخلة إلى مجموعة من الكلمات
        $words = preg_split('/\s+/', $value, -1, PREG_SPLIT_NO_EMPTY);

        // تصحيح الكلمات بناءً على الكلمات الصحيحة المخزنة في قاعدة البيانات
        foreach ($words as &$word) {
            $closestMatch = $this->findClosestWord($word, $correctWords);
            if ($closestMatch) {
                $word = $closestMatch;
            }
        }

        // دمج الكلمات مرة أخرى في نص واحد
        return implode(' ', $words);
    }

    /**
     * البحث عن الكلمة الأقرب في قائمة الكلمات الصحيحة باستخدام Levenshtein Distance.
     */
    private function findClosestWord($word, $correctWords)
    {
        $minDistance = PHP_INT_MAX;
        $closestWord = null;

        foreach ($correctWords as $correctWord) {
            $distance = levenshtein($word, $correctWord);

            // إذا كانت المسافة أقل من المسافة الدنيا، نحدث الكلمة الأقرب
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $closestWord = $correctWord;
            }
        }

        return $closestWord;
    }


    /**
     * تنفيذ البحث في قاعدة البيانات
     */
    private function searchDatabase($correctedValue, $originalValue)
    {
        // تقسيم النص إلى كلمات فردية بعد التصحيح
        $words = preg_split('/\s+/', $correctedValue, -1, PREG_SPLIT_NO_EMPTY);

        // البحث أولاً عن الجملة الكاملة كما هي
        $this->builder->where(function ($query) use ($originalValue) {
            $query->orWhereTranslationLike('name', "%$originalValue%")
                ->orWhereTranslationLike('description', "%$originalValue%")
                ->orWhereHas('category', function ($q) use ($originalValue) {
                    $q->whereTranslationLike('name', "%$originalValue%");
                })
                ->orWhereHas('subCategory', function ($q) use ($originalValue) {
                    $q->whereTranslationLike('name', "%$originalValue%");
                })
                ->orWhereHas('tags', function ($q) use ($originalValue) {
                    $q->whereTranslationLike('name', "%$originalValue%");
                });
        });

        // جلب النتائج المحتملة بعد البحث عن الجملة الكاملة
        $results = $this->builder->get();

        // إذا لم توجد نتائج للجملة الأصلية، نبحث عن الكلمات الفردية
        if ($results->isEmpty()) {
            // إذا كانت النتائج فارغة، نقوم بالبحث عن الكلمات الفردية
            $this->builder->where(function ($query) use ($words) {
                foreach ($words as $word) {
                    $query->orWhereTranslationLike('name', "%$word%")
                        ->orWhereTranslationLike('description', "%$word%")
                        ->orWhereHas('category', function ($q) use ($word) {
                            $q->whereTranslationLike('name', "%$word%");
                        })
                        ->orWhereHas('subCategory', function ($q) use ($word) {
                            $q->whereTranslationLike('name', "%$word%");
                        })
                        ->orWhereHas('tags', function ($q) use ($word) {
                            $q->whereTranslationLike('name', "%$word%");
                        });
                }
            });

            // جلب النتائج بعد تقسيم الجملة إلى كلمات فردية
            $results = $this->builder->get();
        }

        // ترتيب النتائج بناءً على التشابه مع القيمة المدخلة
        return $results->map(function ($item) use ($correctedValue) {
            similar_text($correctedValue, $item->name, $percent);
            $item->similarity = $percent;
            return $item;
        })->sortByDesc('similarity');
    }



    public function stockMoreThan($value)
    {
        if ($value) {
            return $this->builder->where('stock', '>=', $value);
        }

        return $this->builder;
    }

    public function stockLessThan($value)
    {
        if ($value) {
            return $this->builder->where('stock', '<', $value);
        }

        return $this->builder;
    }

    public function minPrice($value)
    {
        if ($value) {
            return $this->builder->where('price', '>=', $value);
        }

        return $this->builder;
    }

    public function maxPrice($value)
    {
        if ($value) {
            return $this->builder->where('price', '<', $value);
        }

        return $this->builder;
    }

    public function sort($value)
    {
        //price_asc
        //price_desc
        //newest
        //oldest
        //

        if ($value) {
            switch ($value) {
                case 'price_desc':
                    return $this->builder->orderBy('price', 'desc');
                case 'price_asc':
                    return $this->builder->orderBy('price', 'asc');
                case 'newest':
                    return $this->builder->orderBy('created_at', 'desc');
                case 'oldest':
                    return $this->builder->orderBy('created_at', 'asc');
                default:
                    return $this->builder->orderBy('price', 'desc');
            }
        }

        return $this->builder;
    }

    public function availability($value)
    {
        if ($value) {
            if ($value === 'available') {
                return $this->builder->where('stock', '>', 0);
            } else {
                return $this->builder->where('stock', '<=', 0);
            }
        }

        return $this->builder;
    }
}
