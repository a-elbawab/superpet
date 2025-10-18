<?php

return [
    'singular' => 'Gallery',
    'plural' => 'Galleries',
    'empty' => 'There are no galleries yet.',
    'count' => 'Galleries Count.',
    'search' => 'Search',
    'select' => 'Select Gallery',
    'permission' => 'Manage galleries',
    'trashed' => 'Trashed galleries',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for gallery',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new gallery',
        'show' => 'Show gallery',
        'edit' => 'Edit gallery',
        'delete' => 'Delete gallery',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The gallery has been created successfully.',
        'updated' => 'The gallery has been updated successfully.',
        'deleted' => 'The gallery has been deleted successfully.',
        'restored' => 'The gallery has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Gallery name',
        'image' => 'Gallery image',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the gallery ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the gallery ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the gallery forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
