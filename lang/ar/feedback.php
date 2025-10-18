<?php

return [
    'singular' => 'الرسالة',
    'plural' => 'رسائل اتصل بنا',
    'empty' => 'لا يوجد رسائل حتى الان',
    'count' => 'عدد رسائل اتصل بنا',
    'search' => 'بحث',
    'select' => 'اختر الرسالة',
    'permission' => 'ادارة رسائل اتصل بنا',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن رسالة',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة رسالة',
        'show' => 'عرض الرسالة',
        'edit' => 'تعديل الرسالة',
        'delete' => 'حذف الرسالة',
        'read' => 'تحديد كمقروء',
        'unread' => 'تحديد كغير مقروء',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'sent' => 'تم ارسال الرسالة بنجاح.',
        'deleted' => 'تم حذف الرسالة بنجاح.',
    ],
    'attributes' => [
        'name' => 'الاسم',
        'phone' => 'رقم الهاتف',
        'email' => 'البريد الالكتروني',
        'message' => 'نص الرسالة',
        'read_at' => 'تاريخ القراءة',
        'type' => 'النوع',
        'read' => 'مقروءة',
        'created_at' => 'تاريخ الارسال',
        'unread' => 'غير مقروءة',
    ],
    'types' => [
        \App\Models\Feedback::COMPLAINT_TYPE => 'شكوي',
        \App\Models\Feedback::QUESTION_TYPE => 'سؤال',
        \App\Models\Feedback::SUGGESTION_TYPE => 'إقتراح',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الرسالة',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
    ],
];
