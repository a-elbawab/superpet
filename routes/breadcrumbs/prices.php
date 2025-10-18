<?php

Breadcrumbs::for('dashboard.prices.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('prices.plural'), route('dashboard.prices.index'));
});

Breadcrumbs::for('dashboard.prices.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.prices.index');
    $breadcrumb->push(trans('prices.trashed'), route('dashboard.prices.trashed'));
});

Breadcrumbs::for('dashboard.prices.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.prices.index');
    $breadcrumb->push(trans('prices.actions.create'), route('dashboard.prices.create'));
});

Breadcrumbs::for('dashboard.prices.show', function ($breadcrumb, $price) {
    $breadcrumb->parent('dashboard.prices.index');
    $breadcrumb->push("#". $price->id, route('dashboard.prices.show', $price));
});

Breadcrumbs::for('dashboard.prices.edit', function ($breadcrumb, $price) {
    $breadcrumb->parent('dashboard.prices.show', $price);
    $breadcrumb->push(trans('prices.actions.edit'), route('dashboard.prices.edit', $price));
});
