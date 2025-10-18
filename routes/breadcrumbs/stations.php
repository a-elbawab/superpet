<?php

Breadcrumbs::for('dashboard.stations.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('stations.plural'), route('dashboard.stations.index'));
});

Breadcrumbs::for('dashboard.stations.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.stations.index');
    $breadcrumb->push(trans('stations.trashed'), route('dashboard.stations.trashed'));
});

Breadcrumbs::for('dashboard.stations.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.stations.index');
    $breadcrumb->push(trans('stations.actions.create'), route('dashboard.stations.create'));
});

Breadcrumbs::for('dashboard.stations.show', function ($breadcrumb, $station) {
    $breadcrumb->parent('dashboard.stations.index');
    $breadcrumb->push($station->title, route('dashboard.stations.show', $station));
});

Breadcrumbs::for('dashboard.stations.edit', function ($breadcrumb, $station) {
    $breadcrumb->parent('dashboard.stations.show', $station);
    $breadcrumb->push(trans('stations.actions.edit'), route('dashboard.stations.edit', $station));
});
