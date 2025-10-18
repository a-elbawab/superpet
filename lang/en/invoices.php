<?php

return [
    'singular' => 'Invoice',
    'plural' => 'Invoices',
    'empty' => 'There are no invoices yet.',
    'count' => 'Invoices Count.',
    'search' => 'Search',
    'select' => 'Select Invoice',
    'permission' => 'Manage invoices',
    'trashed' => 'Trashed invoices',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for invoice',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new invoice',
        'show' => 'Show invoice',
        'edit' => 'Edit invoice',
        'delete' => 'Delete invoice',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The invoice has been created successfully.',
        'updated' => 'The invoice has been updated successfully.',
        'deleted' => 'The invoice has been deleted successfully.',
        'restored' => 'The invoice has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Invoice name',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the invoice ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the invoice ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the invoice forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
