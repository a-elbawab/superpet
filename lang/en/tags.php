<?php

return [
    'singular' => 'Tag',
    'plural' => 'Tags',
    'empty' => 'There are no tags yet.',
    'count' => 'Tags Count.',
    'search' => 'Search',
    'select' => 'Select Tag',
    'permission' => 'Manage tags',
    'trashed' => 'Trashed tags',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for tag',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new tag',
        'show' => 'Show tag',
        'edit' => 'Edit tag',
        'delete' => 'Delete tag',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The tag has been created successfully.',
        'updated' => 'The tag has been updated successfully.',
        'deleted' => 'The tag has been deleted successfully.',
        'restored' => 'The tag has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Tag name',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the tag ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the tag ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the tag forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
