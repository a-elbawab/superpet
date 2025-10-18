<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Translations\ProductTranslation;
use App\Models\Attribute;
use App\Models\Translations\AttributeTranslation;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // تحديد التصنيفات والأوسمة الموجودة
        $categories = \App\Models\Category::all();
        $tags = \App\Models\Tag::all();

        // أسماء حقيقية للمنتجات
        $productNames = [
            'Dog Food',
            'Cat Food',
            'Pet Toys',
            'Dog Leash',
            'Cat Litter',
            'Grooming Kit',
            'Pet Carrier',
            'Training Pads',
            'Pet Shampoo',
            'Dog Collar',
            'Cat Scratcher',
            'Pet Treats',
            'Water Bowl',
            'Pet Bed'
        ];

        // مسار الصور في المجلد العام
        $imagePath = public_path('website/products'); // تأكد من وضع الصور في هذا المسار

        // التحقق من وجود الصور
        if (!is_dir($imagePath) || count(scandir($imagePath)) <= 2) {
            $this->command->error("Please add product images in: {$imagePath}");
            return;
        }

        // الحصول على الصور
        $images = array_values(array_diff(scandir($imagePath), ['.', '..']));

        // إنشاء المنتجات
        foreach ($categories as $category) {
            $productName = $productNames[array_rand($productNames)];

            $product = Product::create([
                'category_id' => $category->id,
                'sub_category_id' => $category->subCategories()->inRandomOrder()->first()?->id, // أو اجعلها تابعة لفئة فرعية حسب الحاجة
                'active' => true,
                'stock' => rand(10, 50),
                'best_seller' => rand(0, 1),
                'price' => rand(100, 1000),
                'old_price' => rand(80, 900),
            ]);

            // إضافة الترجمات للمنتج
            $translations = [
                'en' => ['name' => $productName, 'description' => 'Description for ' . $productName],
                'ar' => ['name' => 'منتج ' . $productName, 'description' => 'وصف المنتج ' . $productName],
            ];

            foreach ($translations as $locale => $data) {
                ProductTranslation::create([
                    'product_id' => $product->id,
                    'locale' => $locale,
                    'name' => $data['name'],
                    'description' => $data['description'],
                ]);
            }

            // رفع الصور باستخدام Media Library
            $randomImage = $images[array_rand($images)];
            $randomImage2 = $images[array_rand($images)];
            $randomImage3 = $images[array_rand($images)];
            $product->addMedia($imagePath . DIRECTORY_SEPARATOR . $randomImage)
                ->preservingOriginal() // يحافظ على الصورة الأصلية
                ->toMediaCollection('main_image');
            $product->addMedia($imagePath . DIRECTORY_SEPARATOR . $randomImage2)
                ->preservingOriginal() // يحافظ على الصورة الأصلية
                ->toMediaCollection('images');
            $product->addMedia($imagePath . DIRECTORY_SEPARATOR . $randomImage3)
                ->preservingOriginal() // يحافظ على الصورة الأصلية
                ->toMediaCollection('images');

            // إضافة السمات
            for ($i = 1; $i <= 3; $i++) {
                $attribute = Attribute::create([
                    'product_id' => $product->id,
                    'value' => rand(1, 100) . 'cm',
                    'unit' => 'cm',
                ]);

                // إضافة الترجمات للسمات
                $attributeTranslations = [
                    'en' => ['name' => 'Attribute ' . $i, 'description' => 'Description for attribute ' . $i],
                    'ar' => ['name' => 'سمة ' . $i, 'description' => 'وصف السمة ' . $i],
                ];

                foreach ($attributeTranslations as $locale => $data) {
                    AttributeTranslation::create([
                        'attribute_id' => $attribute->id,
                        'locale' => $locale,
                        'name' => $data['name'],
                        'description' => $data['description'],
                    ]);
                }
            }

            // ربط المنتج بالأوسمة
            $productTags = $tags->random(2); // اختار أوسمتين عشوائيتين
            $product->tags()->attach($productTags->pluck('id'));
        }
    }
}
