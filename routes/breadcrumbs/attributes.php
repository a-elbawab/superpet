<?php

Breadcrumbs::for('dashboard.attributes.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('attributes.plural'), route('dashboard.attributes.index'));
});

Breadcrumbs::for('dashboard.attributes.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.attributes.index');
    $breadcrumb->push(trans('attributes.trashed'), route('dashboard.attributes.trashed'));
});

Breadcrumbs::for('dashboard.attributes.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.attributes.index');
    $breadcrumb->push(
        trans('attributes.actions.create'),
        route('dashboard.attributes.create')
    );
});

Breadcrumbs::for('dashboard.attributes.show', function ($breadcrumb, $attribute) {
    $breadcrumb->parent('dashboard.attributes.index');
    $breadcrumb->push($attribute->name, route('dashboard.attributes.show', $attribute));
});

Breadcrumbs::for('dashboard.attributes.edit', function ($breadcrumb, $attribute) {
    $breadcrumb->parent('dashboard.attributes.show', $attribute);
    $breadcrumb->push(trans('attributes.actions.edit'), route('dashboard.attributes.edit', $attribute));
});
