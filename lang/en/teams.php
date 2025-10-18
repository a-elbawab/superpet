<?php

return [
    'singular' => 'Team',
    'plural' => 'Teams',
    'empty' => 'There are no teams yet.',
    'count' => 'Teams Count.',
    'search' => 'Search',
    'select' => 'Select Team',
    'permission' => 'Manage teams',
    'trashed' => 'Trashed teams',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for team',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new team',
        'show' => 'Show team',
        'edit' => 'Edit team',
        'delete' => 'Delete team',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The team has been created successfully.',
        'updated' => 'The team has been updated successfully.',
        'deleted' => 'The team has been deleted successfully.',
        'restored' => 'The team has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Team name',
        '%name%' => 'Team name',
        'title' => 'Team title',
        'image' => 'Team image',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the team ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the team ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the team forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
