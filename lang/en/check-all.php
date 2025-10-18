<?php

return [
    'actions' => [
        'delete' => 'Delete Selected',
        'attend' => 'Attend Selected',
    ],
    'messages' => [
        'deleted' => 'The :type has been selected successfully.',
        'attended' => 'The :type has been Attended successfully.',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the :type ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'attend' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to attend the :type ?',
            'confirm' => 'Attend',
            'cancel' => 'Cancel',
        ],
    ],
];
