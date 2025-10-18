<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Translations\TagTranslation;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            ['en' => 'Dogs', 'ar' => 'كلاب'],
            ['en' => 'Cats', 'ar' => 'قطط'],
            ['en' => 'Food', 'ar' => 'طعام'],
            ['en' => 'Toys', 'ar' => 'ألعاب'],
            ['en' => 'Accessories', 'ar' => 'إكسسوارات'],
            ['en' => 'Health Care', 'ar' => 'الرعاية الصحية'],
            ['en' => 'Grooming', 'ar' => 'التجميل والعناية'],
            ['en' => 'Training', 'ar' => 'التدريب'],
            ['en' => 'Adoption', 'ar' => 'التبني'],
            ['en' => 'Services', 'ar' => 'خدمات'],
        ];

        foreach ($tags as $tagData) {
            $tag = Tag::create();

            foreach ($tagData as $locale => $name) {
                TagTranslation::create([
                    'tag_id' => $tag->id,
                    'locale' => $locale,
                    'name' => $name,
                ]);
            }
        }
    }
}
