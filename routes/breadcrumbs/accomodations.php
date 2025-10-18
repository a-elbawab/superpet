<?php

Breadcrumbs::for('dashboard.accomodations.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('accomodations.plural'), route('dashboard.accomodations.index'));
});

Breadcrumbs::for('dashboard.accomodations.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.accomodations.index');
    $breadcrumb->push(trans('accomodations.trashed'), route('dashboard.accomodations.trashed'));
});

Breadcrumbs::for('dashboard.accomodations.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.accomodations.index');
    $breadcrumb->push(trans('accomodations.actions.create'), route('dashboard.accomodations.create'));
});

Breadcrumbs::for('dashboard.accomodations.show', function ($breadcrumb, $accomodation) {
    $breadcrumb->parent('dashboard.accomodations.index');
    $breadcrumb->push($accomodation->name, route('dashboard.accomodations.show', $accomodation));
});

Breadcrumbs::for('dashboard.accomodations.edit', function ($breadcrumb, $accomodation) {
    $breadcrumb->parent('dashboard.accomodations.show', $accomodation);
    $breadcrumb->push(trans('accomodations.actions.edit'), route('dashboard.accomodations.edit', $accomodation));
});
