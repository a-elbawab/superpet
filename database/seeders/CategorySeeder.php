<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Reset the categories table
        // Category::truncate();

        // التصنيفات الرئيسية والفرعية
        $categories = [
            [
                'name' => 'Cats',
                'translations' => [
                    'en' => 'Cats',
                    'ar' => 'القطط',
                ],
                'children' => [
                    [
                        'name' => 'Foods',
                        'translations' => [
                            'en' => 'Foods',
                            'ar' => 'الأطعمة',
                        ],
                        'children' => [
                            ['name' => 'Dry Food', 'translations' => ['en' => 'Dry Food', 'ar' => 'طعام جاف']],
                            ['name' => 'Wet Food', 'translations' => ['en' => 'Wet Food', 'ar' => 'طعام رطب']],
                            ['name' => 'Treats', 'translations' => ['en' => 'Treats', 'ar' => 'مكافآت']],
                            ['name' => 'Fresh Food', 'translations' => ['en' => 'Fresh Food', 'ar' => 'طعام طازج']],
                        ],
                    ],
                    [
                        'name' => 'Accessories',
                        'translations' => [
                            'en' => 'Accessories',
                            'ar' => 'الإكسسوارات',
                        ],
                        'children' => [
                            ['name' => 'Toys', 'translations' => ['en' => 'Toys', 'ar' => 'ألعاب']],
                            ['name' => 'Brushes', 'translations' => ['en' => 'Brushes', 'ar' => 'فُرَش']],
                            ['name' => 'Collars', 'translations' => ['en' => 'Collars', 'ar' => 'أطواق']],
                            ['name' => 'Clippers', 'translations' => ['en' => 'Clippers', 'ar' => 'مقصات']],
                            ['name' => 'Clothes', 'translations' => ['en' => 'Clothes', 'ar' => 'ملابس']],
                            ['name' => 'Boxes', 'translations' => ['en' => 'Boxes', 'ar' => 'صناديق']],
                            ['name' => 'Beds', 'translations' => ['en' => 'Beds', 'ar' => 'أسِرّة']],
                            ['name' => 'Scratches', 'translations' => ['en' => 'Scratches', 'ar' => 'الخدوش']],
                            ['name' => 'Dispenser', 'translations' => ['en' => 'Dispenser', 'ar' => 'موزعات']],
                        ],
                    ],
                    [
                        'name' => 'Hygiene',
                        'translations' => [
                            'en' => 'Hygiene',
                            'ar' => 'النظافة',
                        ],
                        'children' => [
                            ['name' => 'Shampoo', 'translations' => ['en' => 'Shampoo', 'ar' => 'شامبو']],
                            ['name' => 'Perfumes', 'translations' => ['en' => 'Perfumes', 'ar' => 'عطور']],
                            ['name' => 'Wipes', 'translations' => ['en' => 'Wipes', 'ar' => 'مناديل']],
                            ['name' => 'Deodorant', 'translations' => ['en' => 'Deodorant', 'ar' => 'معطر']],
                            ['name' => 'Grooming Gloves', 'translations' => ['en' => 'Grooming Gloves', 'ar' => 'قفازات التجميل']],
                            ['name' => 'Toothpaste', 'translations' => ['en' => 'Toothpaste', 'ar' => 'معجون أسنان']],
                            ['name' => 'Home Spray', 'translations' => ['en' => 'Home Spray', 'ar' => 'رذاذ المنزل']],
                        ],
                    ],
                    [
                        'name' => 'Medication',
                        'translations' => [
                            'en' => 'Medication',
                            'ar' => 'الأدوية',
                        ],
                        'children' => [
                            ['name' => 'Arthritis', 'translations' => ['en' => 'Arthritis', 'ar' => 'التهاب المفاصل']],
                            ['name' => 'Dewormers', 'translations' => ['en' => 'Dewormers', 'ar' => 'مضادات الديدان']],
                            ['name' => 'Supplements', 'translations' => ['en' => 'Supplements', 'ar' => 'المكملات']],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Dogs',
                'translations' => [
                    'en' => 'Dogs',
                    'ar' => 'الكلاب',
                ],
                'children' => [
                    [
                        'name' => 'Foods',
                        'translations' => [
                            'en' => 'Foods',
                            'ar' => 'الأطعمة',
                        ],
                        'children' => [
                            ['name' => 'Dry Food', 'translations' => ['en' => 'Dry Food', 'ar' => 'طعام جاف']],
                            ['name' => 'Wet Food', 'translations' => ['en' => 'Wet Food', 'ar' => 'طعام رطب']],
                            ['name' => 'Treats', 'translations' => ['en' => 'Treats', 'ar' => 'مكافآت']],
                            ['name' => 'Supplements', 'translations' => ['en' => 'Supplements', 'ar' => 'المكملات']],
                            ['name' => 'Special Diets', 'translations' => ['en' => 'Special Diets', 'ar' => 'الأنظمة الغذائية الخاصة']],
                        ],
                    ],
                    [
                        'name' => 'Accessories',
                        'translations' => [
                            'en' => 'Accessories',
                            'ar' => 'الإكسسوارات',
                        ],
                        'children' => [
                            ['name' => 'Toys', 'translations' => ['en' => 'Toys', 'ar' => 'ألعاب']],
                            ['name' => 'Beds', 'translations' => ['en' => 'Beds', 'ar' => 'أسِرّة']],
                            ['name' => 'Collars', 'translations' => ['en' => 'Collars', 'ar' => 'أطواق']],
                            ['name' => 'Muzzles', 'translations' => ['en' => 'Muzzles', 'ar' => 'كمامات']],
                            ['name' => 'Harnesses', 'translations' => ['en' => 'Harnesses', 'ar' => 'أحزمة']],
                            ['name' => 'Dispersers', 'translations' => ['en' => 'Dispersers', 'ar' => 'موزعات']],
                            ['name' => 'Cages', 'translations' => ['en' => 'Cages', 'ar' => 'أقفاص']],
                            ['name' => 'Clothes', 'translations' => ['en' => 'Clothes', 'ar' => 'ملابس']],
                        ],
                    ],
                    [
                        'name' => 'Hygiene',
                        'translations' => [
                            'en' => 'Hygiene',
                            'ar' => 'النظافة',
                        ],
                        'children' => [
                            ['name' => 'Shampoo', 'translations' => ['en' => 'Shampoo', 'ar' => 'شامبو']],
                            ['name' => 'Perfumes', 'translations' => ['en' => 'Perfumes', 'ar' => 'عطور']],
                            ['name' => 'Wipes', 'translations' => ['en' => 'Wipes', 'ar' => 'مناديل']],
                            ['name' => 'Deodorant', 'translations' => ['en' => 'Deodorant', 'ar' => 'معطر']],
                            ['name' => 'Grooming Gloves', 'translations' => ['en' => 'Grooming Gloves', 'ar' => 'قفازات التجميل']],
                            ['name' => 'Toothpaste', 'translations' => ['en' => 'Toothpaste', 'ar' => 'معجون أسنان']],
                        ],
                    ],
                    [
                        'name' => 'Medication',
                        'translations' => [
                            'en' => 'Medication',
                            'ar' => 'الأدوية',
                        ],
                        'children' => [
                            ['name' => 'Flea & Tick', 'translations' => ['en' => 'Flea & Tick', 'ar' => 'البراغيث والقراد']],
                            ['name' => 'Arthritis', 'translations' => ['en' => 'Arthritis', 'ar' => 'التهاب المفاصل']],
                            ['name' => 'Supplements', 'translations' => ['en' => 'Supplements', 'ar' => 'المكملات']],
                        ],
                    ],
                ],
            ],
        ];

        $this->createCategories($categories);
    }

    private function createCategories(array $categories, $parentId = null)
    {
        foreach ($categories as $categoryData) {
            $category = Category::create([
                'parent_id' => $parentId,
                'active' => true,
            ]);

            foreach ($categoryData['translations'] as $locale => $name) {
                $category->translateOrNew($locale)->name = $name;
            }
            $category->save();

            if (!empty($categoryData['children'])) {
                $this->createCategories($categoryData['children'], $category->id);
            }
        }
    }
}
