<?php

return [
    'singular' => 'Post',
    'plural' => 'Posts',
    'empty' => 'There are no posts yet.',
    'count' => 'Posts Count.',
    'search' => 'Search',
    'select' => 'Select Post',
    'permission' => 'Manage posts',
    'trashed' => 'Trashed posts',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for post',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new post',
        'show' => 'Show post',
        'edit' => 'Edit post',
        'delete' => 'Delete post',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The post has been created successfully.',
        'updated' => 'The post has been updated successfully.',
        'deleted' => 'The post has been deleted successfully.',
        'restored' => 'The post has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Post name',
        'paragraph' => 'Post paragraph',
        '%name%' => 'Post name',
        '%paragraph%' => 'Post paragraph',
        'image' => 'Post image',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the post ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the post ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the post forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
