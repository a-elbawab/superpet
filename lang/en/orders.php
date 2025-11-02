<?php

use App\Models\Order;

return [
    'singular' => 'Order',
    'plural' => 'Orders',
    'empty' => 'There are no orders yet.',
    'count' => 'Orders Count.',
    'search' => 'Search',
    'select' => 'Select Order',
    'permission' => 'Manage orders',
    'trashed' => 'Trashed orders',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for order',
    'action' => 'Action',
    'no_orders' => 'There are no orders yet.',
    'view' => 'View',
    'delete' => 'Delete',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new order',
        'show' => 'Show order',
        'edit' => 'Edit order',
        'delete' => 'Delete order',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The order has been created successfully.',
        'updated' => 'The order has been updated successfully.',
        'deleted' => 'The order has been deleted successfully.',
        'restored' => 'The order has been restored successfully.',
    ],
    'attributes' => [
        'id' => 'Order ID',
        'name' => 'Order name',
        'items' => 'Items',
        'discount' => 'Discount',
        'total' => 'Total',
        'payment_method' => 'Payment method',
        'status' => 'Status',
        'email' => 'Email',
        'phone' => 'Phone',
        'address' => 'Address',
        'created_at' => 'Created at',
        'branch_id' => 'Branch',
        'delivery_method' => 'Delivery method',
        'area_id' => 'Area',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the order ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the order ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the order forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],

    'payment_methods' => [
        Order::CASH_ON_DELIVERY => 'Cash on delivery',
        Order::ONLINE => 'Online',
        Order::VISA_ON_DELIVERY => 'Visa on delivery',
    ],

    'statuses' => [
        Order::STATUS_PENDING => 'Pending',
        Order::STATUS_PROCESSING => 'Processing',
        Order::STATUS_SHIPPED => 'Shipped',
        Order::STATUS_DELIVERED => 'Delivered',
        Order::STATUS_CANCELLED => 'Cancelled',
        Order::STATUS_RETURNED => 'Returned',
        Order::STATUS_COMPLETED => 'Completed',
    ],

    'delivery_methods' => [
        Order::DELIVERY_METHOD_PICKUP => 'Branch pickup',
        Order::DELIVERY_METHOD_DELIVERY => 'Delivery',
    ],

    'validation' => [
        'city_required_for_delivery' => 'Please select an area to determine delivery location.',
        'payment_method_not_allowed' => 'The selected payment method is not available. Allowed methods: :allowed_methods',
    ],
];
