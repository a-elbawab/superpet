<?php

Breadcrumbs::for('dashboard.teams.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('teams.plural'), route('dashboard.teams.index'));
});

Breadcrumbs::for('dashboard.teams.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.teams.index');
    $breadcrumb->push(trans('teams.trashed'), route('dashboard.teams.trashed'));
});

Breadcrumbs::for('dashboard.teams.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.teams.index');
    $breadcrumb->push(trans('teams.actions.create'), route('dashboard.teams.create'));
});

Breadcrumbs::for('dashboard.teams.show', function ($breadcrumb, $team) {
    $breadcrumb->parent('dashboard.teams.index');
    $breadcrumb->push($team->name, route('dashboard.teams.show', $team));
});

Breadcrumbs::for('dashboard.teams.edit', function ($breadcrumb, $team) {
    $breadcrumb->parent('dashboard.teams.show', $team);
    $breadcrumb->push(trans('teams.actions.edit'), route('dashboard.teams.edit', $team));
});
