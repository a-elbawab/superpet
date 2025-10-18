<?php

return [
    'singular' => 'Input',
    'plural' => 'Inputs',
    'empty' => 'There are no inputs yet.',
    'count' => 'Inputs Count.',
    'search' => 'Search',
    'select' => 'Select Input',
    'permission' => 'Manage inputs',
    'trashed' => 'Trashed inputs',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for input',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new input',
        'show' => 'Show input',
        'edit' => 'Edit input',
        'delete' => 'Delete input',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The input has been created successfully.',
        'updated' => 'The input has been updated successfully.',
        'deleted' => 'The input has been deleted successfully.',
        'restored' => 'The input has been restored successfully.',
    ],
    'attributes' => [
        'label' => 'Input label',
        'name' => 'Input name',
        'section_id' => 'Section',
        'type' => 'Input type',
        'options' => 'Options',
        'required' => 'Required',
        'order' => 'Order',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the input ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the input ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the input forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],

    'types' => [
        'text' => 'Text',
        'number' => 'Number',
        'email' => 'Email',
        'date' => 'Date',
        'file' => 'File',
        'time' => 'Time',
        'datetime' => 'Datetime',
        'select' => 'Select',
        'radio' => 'Radio',
        'checkbox' => 'Checkbox',
        'textarea' => 'Textarea',
    ],

    'required' => [
        true => 'Yes',
        false => 'No',
    ]
];
