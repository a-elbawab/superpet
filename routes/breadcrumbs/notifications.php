<?php

Breadcrumbs::for('dashboard.notifications.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('notifications.plural'), route('dashboard.notifications.index'));
});

Breadcrumbs::for('dashboard.notifications.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.notifications.index');
    $breadcrumb->push(trans('notifications.actions.create'), route('dashboard.notifications.create'));
});

Breadcrumbs::for('dashboard.notifications.show', function ($breadcrumb, $notification) {
    $breadcrumb->parent('dashboard.notifications.index');
    $breadcrumb->push(trans('notifications.actions.show'), route('dashboard.notifications.show', $notification));
});
