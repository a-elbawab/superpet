<?php

Breadcrumbs::for('dashboard.branches.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('branches.plural'), route('dashboard.branches.index'));
});

Breadcrumbs::for('dashboard.branches.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.branches.index');
    $breadcrumb->push(trans('branches.trashed'), route('dashboard.branches.trashed'));
});

Breadcrumbs::for('dashboard.branches.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.branches.index');
    $breadcrumb->push(trans('branches.actions.create'), route('dashboard.branches.create'));
});

Breadcrumbs::for('dashboard.branches.show', function ($breadcrumb, $branch) {
    $breadcrumb->parent('dashboard.branches.index');
    $breadcrumb->push($branch->name, route('dashboard.branches.show', $branch));
});

Breadcrumbs::for('dashboard.branches.edit', function ($breadcrumb, $branch) {
    $breadcrumb->parent('dashboard.branches.show', $branch);
    $breadcrumb->push(trans('branches.actions.edit'), route('dashboard.branches.edit', $branch));
});
