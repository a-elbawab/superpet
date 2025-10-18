<?php

Breadcrumbs::for('dashboard.abstracts.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('abstracts.plural'), route('dashboard.abstracts.index'));
});

Breadcrumbs::for('dashboard.abstracts.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.abstracts.index');
    $breadcrumb->push(trans('abstracts.trashed'), route('dashboard.abstracts.trashed'));
});

Breadcrumbs::for('dashboard.abstracts.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.abstracts.index');
    $breadcrumb->push(trans('abstracts.actions.create'), route('dashboard.abstracts.create'));
});

Breadcrumbs::for('dashboard.abstracts.show', function ($breadcrumb, $abstract) {
    $breadcrumb->parent('dashboard.abstracts.index');
    $breadcrumb->push($abstract->name, route('dashboard.abstracts.show', $abstract));
});

Breadcrumbs::for('dashboard.abstracts.edit', function ($breadcrumb, $abstract) {
    $breadcrumb->parent('dashboard.abstracts.show', $abstract);
    $breadcrumb->push(trans('abstracts.actions.edit'), route('dashboard.abstracts.edit', $abstract));
});
