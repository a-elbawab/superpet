<?php

return [
    'singular' => 'Option',
    'plural' => 'Options',
    'empty' => 'There are no options yet.',
    'count' => 'Options Count.',
    'search' => 'Search',
    'select' => 'Select Option',
    'permission' => 'Manage options',
    'trashed' => 'Trashed options',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for option',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new option',
        'show' => 'Show option',
        'edit' => 'Edit option',
        'delete' => 'Delete option',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The option has been created successfully.',
        'updated' => 'The option has been updated successfully.',
        'deleted' => 'The option has been deleted successfully.',
        'restored' => 'The option has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Option name',
        'value' => 'Option value',
        'input_id'=> 'Input',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the option ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the option ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the option forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
