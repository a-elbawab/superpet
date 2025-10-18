<?php

Breadcrumbs::for('dashboard.inputs.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('inputs.plural'), route('dashboard.inputs.index'));
});

Breadcrumbs::for('dashboard.inputs.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.inputs.index');
    $breadcrumb->push(trans('inputs.trashed'), route('dashboard.inputs.trashed'));
});

Breadcrumbs::for('dashboard.inputs.create', function ($breadcrumb, $section) {
    $breadcrumb->parent('dashboard.inputs.index');
    $breadcrumb->push(trans('inputs.actions.create'), route('dashboard.inputs.create', $section));
});

Breadcrumbs::for('dashboard.inputs.show', function ($breadcrumb, $input) {
    $breadcrumb->parent('dashboard.inputs.index');
    $breadcrumb->push($input->name, route('dashboard.inputs.show', $input));
});

Breadcrumbs::for('dashboard.inputs.edit', function ($breadcrumb, $input) {
    $breadcrumb->parent('dashboard.inputs.show', $input);
    $breadcrumb->push(trans('inputs.actions.edit'), route('dashboard.inputs.edit', $input));
});
