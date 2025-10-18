<?php

Breadcrumbs::for('dashboard.countries.cities.edit', function ($breadcrumb, $country, $city) {
    $breadcrumb->parent('dashboard.countries.show', $country);
    $breadcrumb->push(
        trans('cities.actions.edit'),
        route('dashboard.countries.cities.edit', [$country, $city])
    );
});

Breadcrumbs::for('dashboard.cities.areas.edit', function ($breadcrumb, $city, $area) {
    $breadcrumb->parent('dashboard.countries.cities.show', $city->country, $city);
    $breadcrumb->push(
        trans('areas.actions.edit'),
        route('dashboard.cities.areas.edit', [$city, $area])
    );
});

Breadcrumbs::for('dashboard.countries.cities.show', function ($breadcrumb, $country, $city) {
    $breadcrumb->parent('dashboard.countries.show', $country);
    $breadcrumb->push(
        trans('cities.actions.show'),
        route('dashboard.countries.cities.show', [$country, $city])
    );
});
