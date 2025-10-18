<?php

Breadcrumbs::for('dashboard.events.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('events.plural'), route('dashboard.events.index'));
});

Breadcrumbs::for('dashboard.events.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.events.index');
    $breadcrumb->push(trans('events.trashed'), route('dashboard.events.trashed'));
});

Breadcrumbs::for('dashboard.events.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.events.index');
    $breadcrumb->push(trans('events.actions.create'), route('dashboard.events.create'));
});

Breadcrumbs::for('dashboard.events.show', function ($breadcrumb, $event) {
    $breadcrumb->parent('dashboard.events.index');
    $breadcrumb->push($event->title, route('dashboard.events.show', $event));
});

Breadcrumbs::for('dashboard.events.edit', function ($breadcrumb, $event) {
    $breadcrumb->parent('dashboard.events.show', $event);
    $breadcrumb->push(trans('events.actions.edit'), route('dashboard.events.edit', $event));
});
