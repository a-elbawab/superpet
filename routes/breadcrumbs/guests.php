<?php

Breadcrumbs::for('dashboard.guests.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('guests.plural'), route('dashboard.guests.index'));
});

Breadcrumbs::for('dashboard.guests.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.guests.index');
    $breadcrumb->push(trans('guests.trashed'), route('dashboard.guests.trashed'));
});

Breadcrumbs::for('dashboard.guests.create', function ($breadcrumb, $event) {
    $breadcrumb->parent('dashboard.guests.index');
    $breadcrumb->push(trans('guests.actions.create'), route('dashboard.guests.create', $event));
});

Breadcrumbs::for('dashboard.guests.show', function ($breadcrumb, $guest) {
    $breadcrumb->parent('dashboard.guests.index');
    $breadcrumb->push($guest->first_name, route('dashboard.guests.show', $guest));
});

Breadcrumbs::for('dashboard.guests.edit', function ($breadcrumb, $guest) {
    $breadcrumb->parent('dashboard.guests.show', $guest);
    $breadcrumb->push(trans('guests.actions.edit'), route('dashboard.guests.edit', $guest));
});
