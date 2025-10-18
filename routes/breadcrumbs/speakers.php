<?php

Breadcrumbs::for('dashboard.speakers.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('speakers.plural'), route('dashboard.speakers.index'));
});

Breadcrumbs::for('dashboard.speakers.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.speakers.index');
    $breadcrumb->push(trans('speakers.trashed'), route('dashboard.speakers.trashed'));
});

Breadcrumbs::for('dashboard.speakers.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.speakers.index');
    $breadcrumb->push(trans('speakers.actions.create'), route('dashboard.speakers.create'));
});

Breadcrumbs::for('dashboard.speakers.show', function ($breadcrumb, $speaker) {
    $breadcrumb->parent('dashboard.speakers.index');
    $breadcrumb->push($speaker->name, route('dashboard.speakers.show', $speaker));
});

Breadcrumbs::for('dashboard.speakers.edit', function ($breadcrumb, $speaker) {
    $breadcrumb->parent('dashboard.speakers.show', $speaker);
    $breadcrumb->push(trans('speakers.actions.edit'), route('dashboard.speakers.edit', $speaker));
});
