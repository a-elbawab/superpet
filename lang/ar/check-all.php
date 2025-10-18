<?php

return [
    'actions' => [
        'delete' => 'حذف المحدد',
        'restore' => 'استعادة المحدد',
        'attend' => 'حضور المحدد',
    ],
    'messages' => [
        'deleted' => 'تم حذف :type بنجاح.',
        'restored' => 'تم استعادة :type بنجاح.',
        'attended' => 'تم حضور :type بنجاح.',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف :type',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد استعادة :type',
            'confirm' => 'استعادة',
            'cancel' => 'إلغاء',
        ],
        'attend' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حضور :type',
            'confirm' => 'حضور',
            'cancel' => 'إلغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف :type نهائياً',
            'confirm' => 'حذف نهائي',
            'cancel' => 'إلغاء',
        ],
    ],
];
