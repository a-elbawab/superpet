<?php

return [
    'singular' => 'قسم ',
    'plural' => 'الأقسام ',
    'empty' => 'لا يوجد أقسام حتى الان',
    'count' => 'عدد أقسام ',
    'search' => 'بحث',
    'select' => 'اختر قسم ',
    'permission' => 'ادارة أقسام ',
    'trashed' => 'أقسام المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن قسم ',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة قسم ',
        'show' => 'عرض قسم ',
        'edit' => 'تعديل قسم ',
        'delete' => 'حذف قسم ',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة قسم بنجاح.',
        'updated' => 'تم تعديل قسم بنجاح.',
        'deleted' => 'تم حذف قسم بنجاح.',
        'restored' => 'تم استعادة قسم بنجاح.',
        'max_depth' => 'يجب ان لا يتجاوز عمق القسم عن 3',
    ],
    'attributes' => [
        'meta_description' => 'وصف الميتا',
        'meta_keywords' => 'كلمات الميتا',
        'active' => 'فعال',
        'depth' => 'عمق القسم',
        'name' => 'اسم قسم',
        'image' => 'صورة قسم ',
        '%name%' => 'اسم قسم ',
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
        'parent_id' => 'القسم الرئيسي',
        'children' => 'الاقسام الفرعية',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف قسم ',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا قسم ',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا قسم نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
    'active' =>[
        true => 'فعال',
        false => 'غير فعال',
    ]
];
