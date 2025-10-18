<?php

Breadcrumbs::for('dashboard.sections.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('sections.plural'), route('dashboard.sections.index'));
});

Breadcrumbs::for('dashboard.sections.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.sections.index');
    $breadcrumb->push(trans('sections.trashed'), route('dashboard.sections.trashed'));
});

Breadcrumbs::for('dashboard.sections.create', function ($breadcrumb, $service) {
    $breadcrumb->parent('dashboard.sections.index');
    $breadcrumb->push(trans('sections.actions.create'), route('dashboard.sections.create', $service));
});

Breadcrumbs::for('dashboard.sections.show', function ($breadcrumb, $section) {
    $breadcrumb->parent('dashboard.sections.index');
    $breadcrumb->push($section->name, route('dashboard.sections.show', $section));
});

Breadcrumbs::for('dashboard.sections.edit', function ($breadcrumb, $section) {
    $breadcrumb->parent('dashboard.sections.show', $section);
    $breadcrumb->push(trans('sections.actions.edit'), route('dashboard.sections.edit', $section));
});
