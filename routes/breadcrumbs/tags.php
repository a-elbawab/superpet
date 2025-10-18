<?php

Breadcrumbs::for('dashboard.tags.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('tags.plural'), route('dashboard.tags.index'));
});

Breadcrumbs::for('dashboard.tags.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.tags.index');
    $breadcrumb->push(trans('tags.trashed'), route('dashboard.tags.trashed'));
});

Breadcrumbs::for('dashboard.tags.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.tags.index');
    $breadcrumb->push(trans('tags.actions.create'), route('dashboard.tags.create'));
});

Breadcrumbs::for('dashboard.tags.show', function ($breadcrumb, $tag) {
    $breadcrumb->parent('dashboard.tags.index');
    $breadcrumb->push($tag->name, route('dashboard.tags.show', $tag));
});

Breadcrumbs::for('dashboard.tags.edit', function ($breadcrumb, $tag) {
    $breadcrumb->parent('dashboard.tags.show', $tag);
    $breadcrumb->push(trans('tags.actions.edit'), route('dashboard.tags.edit', $tag));
});
