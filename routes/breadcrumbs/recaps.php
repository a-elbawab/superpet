<?php

Breadcrumbs::for('dashboard.recaps.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('recaps.plural'), route('dashboard.recaps.index'));
});

Breadcrumbs::for('dashboard.recaps.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.recaps.index');
    $breadcrumb->push(trans('recaps.trashed'), route('dashboard.recaps.trashed'));
});

Breadcrumbs::for('dashboard.recaps.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.recaps.index');
    $breadcrumb->push(trans('recaps.actions.create'), route('dashboard.recaps.create'));
});

Breadcrumbs::for('dashboard.recaps.show', function ($breadcrumb, $recap) {
    $breadcrumb->parent('dashboard.recaps.index');
    $breadcrumb->push($recap->name, route('dashboard.recaps.show', $recap));
});

Breadcrumbs::for('dashboard.recaps.edit', function ($breadcrumb, $recap) {
    $breadcrumb->parent('dashboard.recaps.show', $recap);
    $breadcrumb->push(trans('recaps.actions.edit'), route('dashboard.recaps.edit', $recap));
});
