<?php

Breadcrumbs::for('dashboard.options.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('options.plural'), route('dashboard.options.index'));
});

Breadcrumbs::for('dashboard.options.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.options.index');
    $breadcrumb->push(trans('options.trashed'), route('dashboard.options.trashed'));
});

Breadcrumbs::for('dashboard.options.create', function ($breadcrumb, $input) {
    $breadcrumb->parent('dashboard.options.index');
    $breadcrumb->push(trans('options.actions.create'), route('dashboard.options.create', $input));
});

Breadcrumbs::for('dashboard.options.show', function ($breadcrumb, $option) {
    $breadcrumb->parent('dashboard.options.index');
    $breadcrumb->push($option->name, route('dashboard.options.show', $option));
});

Breadcrumbs::for('dashboard.options.edit', function ($breadcrumb, $option) {
    $breadcrumb->parent('dashboard.options.show', $option);
    $breadcrumb->push(trans('options.actions.edit'), route('dashboard.options.edit', $option));
});
