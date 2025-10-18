<?php

return [
    'singular' => 'Booking',
    'plural' => 'Bookings',
    'empty' => 'There are no bookings yet.',
    'count' => 'Bookings Count.',
    'search' => 'Search',
    'select' => 'Select Booking',
    'permission' => 'Manage bookings',
    'trashed' => 'Trashed bookings',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for booking',
    'no_bookings' => 'There are no bookings yet.',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new booking',
        'show' => 'Show booking',
        'edit' => 'Edit booking',
        'delete' => 'Delete booking',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The booking has been created successfully.',
        'updated' => 'The booking has been updated successfully.',
        'deleted' => 'The booking has been deleted successfully.',
        'restored' => 'The booking has been restored successfully.',
    ],
    'attributes' => [
        'service_id' => 'Service',
        'inputs' => 'Inputs',
        'files' => 'Files',
        'created_at' => 'Created At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the booking ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the booking ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the booking forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
