<?php

Breadcrumbs::for('dashboard.bookings.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('bookings.plural'), route('dashboard.bookings.index'));
});

Breadcrumbs::for('dashboard.bookings.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.bookings.index');
    $breadcrumb->push(trans('bookings.trashed'), route('dashboard.bookings.trashed'));
});

Breadcrumbs::for('dashboard.bookings.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.bookings.index');
    $breadcrumb->push(trans('bookings.actions.create'), route('dashboard.bookings.create'));
});

Breadcrumbs::for('dashboard.bookings.show', function ($breadcrumb, $booking) {
    $breadcrumb->parent('dashboard.bookings.index');
    $breadcrumb->push("#".$booking->id, route('dashboard.bookings.show', $booking));
});

Breadcrumbs::for('dashboard.bookings.edit', function ($breadcrumb, $booking) {
    $breadcrumb->parent('dashboard.bookings.show', $booking);
    $breadcrumb->push(trans('bookings.actions.edit'), route('dashboard.bookings.edit', $booking));
});
