<?php

return [
    'singular' => 'Branch',
    'plural' => 'Branches',
    'empty' => 'There are no branches yet.',
    'count' => 'Branches Count.',
    'search' => 'Search',
    'select' => 'Select Branch',
    'permission' => 'Manage branches',
    'trashed' => 'Trashed branches',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for branch',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new branch',
        'show' => 'Show branch',
        'edit' => 'Edit branch',
        'delete' => 'Delete branch',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The branch has been created successfully.',
        'updated' => 'The branch has been updated successfully.',
        'deleted' => 'The branch has been deleted successfully.',
        'restored' => 'The branch has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Branch name',
        'phone' => 'Phone',
        'address' => 'Address',
        'location_url' => 'Location url',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the branch ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the branch ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the branch forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
