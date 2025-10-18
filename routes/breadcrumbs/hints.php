<?php

Breadcrumbs::for('dashboard.hints.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('hints.plural'), route('dashboard.hints.index'));
});

Breadcrumbs::for('dashboard.hints.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.hints.index');
    $breadcrumb->push(trans('hints.trashed'), route('dashboard.hints.trashed'));
});

Breadcrumbs::for('dashboard.hints.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.hints.index');
    $breadcrumb->push(trans('hints.actions.create'), route('dashboard.hints.create'));
});

Breadcrumbs::for('dashboard.hints.show', function ($breadcrumb, $hint) {
    $breadcrumb->parent('dashboard.hints.index');
    $breadcrumb->push($hint->id, route('dashboard.hints.show', $hint));
});

Breadcrumbs::for('dashboard.hints.edit', function ($breadcrumb, $hint) {
    $breadcrumb->parent('dashboard.hints.show', $hint);
    $breadcrumb->push(trans('hints.actions.edit'), route('dashboard.hints.edit', $hint));
});
