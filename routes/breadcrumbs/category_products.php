<?php

Breadcrumbs::for('dashboard.category_products.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('category_products.plural'), route('dashboard.category_products.index'));
});

Breadcrumbs::for('dashboard.category_products.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.category_products.index');
    $breadcrumb->push(trans('category_products.trashed'), route('dashboard.category_products.trashed'));
});

Breadcrumbs::for('dashboard.category_products.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.category_products.index');
    $breadcrumb->push(trans('category_products.actions.create'), route('dashboard.category_products.create'));
});

Breadcrumbs::for('dashboard.category_products.show', function ($breadcrumb, $category_product) {
    $breadcrumb->parent('dashboard.category_products.index');
    $breadcrumb->push($category_product->id, route('dashboard.category_products.show', $category_product));
});

Breadcrumbs::for('dashboard.category_products.edit', function ($breadcrumb, $category_product) {
    $breadcrumb->parent('dashboard.category_products.show', $category_product);
    $breadcrumb->push(trans('category_products.actions.edit'), route('dashboard.category_products.edit', $category_product));
});
