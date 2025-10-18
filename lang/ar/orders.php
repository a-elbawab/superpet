<?php

use App\Models\Order;

return [
    'singular' => 'الطلبات',
    'plural' => 'الطلبات',
    'empty' => 'لا يوجد طلبات حتى الان',
    'count' => 'عدد الطلبات',
    'search' => 'بحث',
    'select' => 'اختر الطلبات',
    'permission' => 'ادارة الطلبات',
    'trashed' => 'الطلبات المحذوفة',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن طلبات',
    'action' => 'إجراء',
    'no_orders' => 'لا يوجد طلبات حتى الان',
    'view' => 'عرض الطلب',
    'delete' => 'حذف الطلب',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة طلبات',
        'show' => 'عرض الطلبات',
        'edit' => 'تعديل الطلبات',
        'delete' => 'حذف الطلبات',
        'restore' => 'استعادة',
        'forceDelete' => 'حذف نهائي',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة الطلبات بنجاح.',
        'updated' => 'تم تعديل الطلبات بنجاح.',
        'deleted' => 'تم حذف الطلبات بنجاح.',
        'restored' => 'تم استعادة الطلبات بنجاح.',
    ],
    'attributes' => [
        'id' => 'رقم الطلب',
        'name' => 'اسم الطلب',
        'items' => 'المنتجات',
        'discount' => 'الخصم',
        'total' => 'المجموع',
        'payment_method' => 'طريقة الدفع',
        'status' => 'الحالة',
        'email' => 'البريد الالكتروني',
        'phone' => 'رقم الجوال',
        'address' => 'العنوان',
        'branch_id' => 'الفرع',
        'delivery_method' => 'طريقة التوصيل',
        'area_id' => 'المنطقة',
        'created_at' => 'التاريخ',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الطلبات ؟',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة الطلبات ؟',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الطلبات نهائياً ؟',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],

    'payment_methods' => [
        Order::CASH_ON_DELIVERY => 'الدفع عند الاستلام',
        Order::ONLINE => 'الدفع عبر الانترنت',
        Order::VISA_ON_DELIVERY => 'الدفع عبر الانترنت والدفع عند الاستلام',
    ],

    'statuses' => [
        Order::STATUS_PENDING => 'قيد الانتظار',
        Order::STATUS_PROCESSING => 'قيد التجهيز',
        Order::STATUS_SHIPPED => 'تم الشحن',
        Order::STATUS_DELIVERED => 'تم التوصيل',
        Order::STATUS_CANCELLED => 'مرفوض',
        Order::STATUS_RETURNED => 'مرتجع',
        Order::STATUS_COMPLETED => 'مكتمل',
    ],

    'delivery_methods' => [
        Order::DELIVERY_METHOD_PICKUP => 'إستلام من الفرع',
        Order::DELIVERY_METHOD_DELIVERY => 'توصيل',
    ],
];
