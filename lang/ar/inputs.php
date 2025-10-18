<?php

return [
    'singular' => 'الحقل',
    'plural' => 'الحقول',
    'empty' => 'لا يوجد حقول حتى الان',
    'count' => 'عدد الحقول',
    'search' => 'بحث',
    'select' => 'اختر الحقل',
    'permission' => 'ادارة الحقول',
    'trashed' => 'الحقول المحذوفة',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن حقل',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة حقل',
        'show' => 'عرض الحقل',
        'edit' => 'تعديل الحقل',
        'delete' => 'حذف الحقل',
        'restore' => 'استعادة',
        'forceDelete' => 'حذف نهائي',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة الحقل بنجاح.',
        'updated' => 'تم تعديل الحقل بنجاح.',
        'deleted' => 'تم حذف الحقل بنجاح.',
        'restored' => 'تم استعادة الحقل بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم الحقل',
        'type' => 'نوع الحقل',
        'required' => 'مطلوب',
        'options' => 'خيارات',
        'section_id' => 'القسم',
        'order' => 'الترتيب',
        'label' => 'الاسم',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الحقل ؟',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة الحقل ؟',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الحقل نهائياً ؟',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],

    'types' => [
        'text' => 'نص',
        'number' => 'عدد',
        'email' => 'بريد',
        'date' => 'تاريخ',
        'file' => 'ملف',
        'time' => 'وقت',
        'datetime' => 'تاريخ ووقت',
        'select' => 'قائمة',
        'radio' => 'اختيار',
        'checkbox' => 'خانة',
        'textarea' => 'محتوى',
    ],

    'required' => [
        true => 'نعم',
        false => 'لا',
    ]

];
