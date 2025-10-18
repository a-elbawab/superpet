<?php

Breadcrumbs::for('dashboard.galleries.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('galleries.plural'), route('dashboard.galleries.index'));
});

Breadcrumbs::for('dashboard.galleries.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.galleries.index');
    $breadcrumb->push(trans('galleries.trashed'), route('dashboard.galleries.trashed'));
});

Breadcrumbs::for('dashboard.galleries.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.galleries.index');
    $breadcrumb->push(trans('galleries.actions.create'), route('dashboard.galleries.create'));
});

Breadcrumbs::for('dashboard.galleries.show', function ($breadcrumb, $gallery) {
    $breadcrumb->parent('dashboard.galleries.index');
    $breadcrumb->push($gallery->id, route('dashboard.galleries.show', $gallery));
});

Breadcrumbs::for('dashboard.galleries.edit', function ($breadcrumb, $gallery) {
    $breadcrumb->parent('dashboard.galleries.show', $gallery);
    $breadcrumb->push(trans('galleries.actions.edit'), route('dashboard.galleries.edit', $gallery));
});
