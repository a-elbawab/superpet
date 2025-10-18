<?php

Breadcrumbs::for('dashboard.variations.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('variations.plural'), route('dashboard.variations.index'));
});

Breadcrumbs::for('dashboard.variations.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.variations.index');
    $breadcrumb->push(trans('variations.trashed'), route('dashboard.variations.trashed'));
});

Breadcrumbs::for('dashboard.variations.create', function ($breadcrumb, $attribute) {
    $breadcrumb->parent('dashboard.variations.index');
    $breadcrumb->push(
        trans('variations.actions.create'),
        route('dashboard.variations.create', $attribute)
    );
});

Breadcrumbs::for('dashboard.variations.show', function ($breadcrumb, $variation) {
    $breadcrumb->parent('dashboard.variations.index');
    $breadcrumb->push($variation->name, route('dashboard.variations.show', $variation));
});

Breadcrumbs::for('dashboard.variations.edit', function ($breadcrumb, $variation) {
    $breadcrumb->parent('dashboard.variations.show', $variation);
    $breadcrumb->push(trans('variations.actions.edit'), route('dashboard.variations.edit', $variation));
});
