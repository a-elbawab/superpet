<?php

Breadcrumbs::for('dashboard.registrations.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('registrations.plural'), route('dashboard.registrations.index'));
});

Breadcrumbs::for('dashboard.registrations.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.registrations.index');
    $breadcrumb->push(trans('registrations.trashed'), route('dashboard.registrations.trashed'));
});

Breadcrumbs::for('dashboard.registrations.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.registrations.index');
    $breadcrumb->push(trans('registrations.actions.create'), route('dashboard.registrations.create'));
});

Breadcrumbs::for('dashboard.registrations.show', function ($breadcrumb, $registration) {
    $breadcrumb->parent('dashboard.registrations.index');
    $breadcrumb->push($registration->name, route('dashboard.registrations.show', $registration));
});

Breadcrumbs::for('dashboard.registrations.edit', function ($breadcrumb, $registration) {
    $breadcrumb->parent('dashboard.registrations.show', $registration);
    $breadcrumb->push(trans('registrations.actions.edit'), route('dashboard.registrations.edit', $registration));
});
