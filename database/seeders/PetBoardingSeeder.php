<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Section;
use App\Models\Input;
use App\Models\Option;
use App\Models\Translations\ServiceTranslation;

class PetBoardingSeeder extends Seeder
{
    public function run()
    {
        // 1. إضافة الخدمة (Pet Boarding)
        $service = Service::create();

        // 2. إضافة ترجمات الخدمة (Translations for service)
        ServiceTranslation::create([
            'service_id' => $service->id,
            'locale' => 'en',
            'name' => 'Pet Boarding',
            'description' => 'A service that provides temporary accommodation for pets.'
        ]);

        ServiceTranslation::create([
            'service_id' => $service->id,
            'locale' => 'ar',
            'name' => 'إقامة الحيوانات الأليفة',
            'description' => 'خدمة توفر إقامة مؤقتة للحيوانات الأليفة.'
        ]);

        // 3. الأقسام (Sections)
        $sections = [
            [
                'name' => ['en' => "Owner's Information", 'ar' => 'معلومات المالك'],
                'inputs' => [
                    [
                        'name' => ['en' => "Owner's Name", 'ar' => 'اسم المالك'],
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'name' => ['en' => "Owner's ID", 'ar' => 'رقم هوية المالك'],
                        'type' => 'text',
                        'required' => true,
                    ],
                ],
            ],
            [
                'name' => ['en' => "Boarding Information", 'ar' => 'معلومات الإقامة'],
                'inputs' => [
                    [
                        'name' => ['en' => "Boarding Period", 'ar' => 'مدة الإقامة'],
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'name' => ['en' => "Boarding Date", 'ar' => 'تاريخ الإقامة'],
                        'type' => 'text',
                        'required' => true,
                    ],
                ],
            ],
            [
                'name' => ['en' => "Pet's Information", 'ar' => 'معلومات الحيوان الأليف'],
                'inputs' => [
                    [
                        'name' => ['en' => "Name", 'ar' => 'الاسم'],
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'name' => ['en' => "Sex", 'ar' => 'الجنس'],
                        'type' => 'select',
                        'required' => true,
                        'options' => [
                            ['value' => 'male', 'name' => ['en' => 'Male', 'ar' => 'ذكر']],
                            ['value' => 'female', 'name' => ['en' => 'Female', 'ar' => 'أنثى']],
                        ],
                    ],
                    [
                        'name' => ['en' => "Age", 'ar' => 'العمر'],
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'name' => ['en' => "Last Fleas Medication", 'ar' => 'آخر علاج للبراغيث'],
                        'type' => 'text',
                        'required' => false,
                    ],
                    [
                        'name' => ['en' => "Last Deworming Medication", 'ar' => 'آخر علاج للديدان'],
                        'type' => 'text',
                        'required' => false,
                    ],
                    [
                        'name' => ['en' => "Last Vaccination", 'ar' => 'آخر تطعيم'],
                        'type' => 'text',
                        'required' => false,
                    ],
                    [
                        'name' => ['en' => "Medical History", 'ar' => 'التاريخ الطبي'],
                        'type' => 'text',
                        'required' => false,
                    ],
                ],
            ],
            [
                'name' => ['en' => "Behavioral Information", 'ar' => 'المعلومات السلوكية'],
                'inputs' => [
                    [
                        'name' => ['en' => "Behaviour to Other Cats", 'ar' => 'التعامل مع القطط الأخرى'],
                        'type' => 'radio',
                        'required' => true,
                        'options' => [
                            ['value' => 'very_calm', 'name' => ['en' => 'Very Calm', 'ar' => 'هادئ جدًا']],
                            ['value' => 'calm', 'name' => ['en' => 'Calm', 'ar' => 'هادئ']],
                            ['value' => 'normal', 'name' => ['en' => 'Normal', 'ar' => 'طبيعي']],
                            ['value' => 'aggressive', 'name' => ['en' => 'Aggressive', 'ar' => 'عدواني']],
                            ['value' => 'very_aggressive', 'name' => ['en' => 'Very Aggressive', 'ar' => 'عدواني جدًا']],
                        ],
                    ],
                    [
                        'name' => ['en' => "Behaviour to Doctors", 'ar' => 'التعامل مع الأطباء'],
                        'type' => 'radio',
                        'required' => true,
                        'options' => [
                            ['value' => 'normal', 'name' => ['en' => 'Normal', 'ar' => 'طبيعي']],
                            ['value' => 'anti', 'name' => ['en' => 'Anti', 'ar' => 'مضاد']],
                            ['value' => 'social', 'name' => ['en' => 'Social', 'ar' => 'اجتماعي']],
                        ],
                    ],
                ],
            ],
            [
                'name' => ['en' => "Food Preferences", 'ar' => 'تفضيلات الطعام'],
                'inputs' => [
                    [
                        'name' => ['en' => "Preferred Food", 'ar' => 'الطعام المفضل'],
                        'type' => 'radio',
                        'required' => true,
                        'options' => [
                            ['value' => 'dry', 'name' => ['en' => 'Dry', 'ar' => 'جاف']],
                            ['value' => 'soft', 'name' => ['en' => 'Soft', 'ar' => 'طري']],
                            ['value' => 'other', 'name' => ['en' => 'Other', 'ar' => 'أخرى']],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($sections as $sectionData) {
            $section = Section::create([
                'service_id' => $service->id,
                'name' => $sectionData['name']['en'], // Save only the English version in the 'name' column
            ]);

            foreach ($sectionData['inputs'] as $inputData) {
                $input = Input::create([
                    'section_id' => $section->id,
                    'name' => $inputData['name']['en'], // Save only the English version in the 'name' column
                    'type' => $inputData['type'],
                    'required' => $inputData['required'],
                ]);

                if (isset($inputData['options'])) {
                    foreach ($inputData['options'] as $optionData) {
                        Option::create([
                            'input_id' => $input->id,
                            'value' => $optionData['value'],
                            'name' => $optionData['name']['en'], // Save only the English version in the 'name' column
                        ]);
                    }
                }
            }
        }
    }
}
