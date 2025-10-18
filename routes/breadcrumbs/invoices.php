<?php

Breadcrumbs::for('dashboard.invoices.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('invoices.plural'), route('dashboard.invoices.index'));
});

Breadcrumbs::for('dashboard.invoices.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.invoices.index');
    $breadcrumb->push(trans('invoices.trashed'), route('dashboard.invoices.trashed'));
});

Breadcrumbs::for('dashboard.invoices.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.invoices.index');
    $breadcrumb->push(trans('invoices.actions.create'), route('dashboard.invoices.create'));
});

Breadcrumbs::for('dashboard.invoices.show', function ($breadcrumb, $invoice) {
    $breadcrumb->parent('dashboard.invoices.index');
    $breadcrumb->push($invoice->name, route('dashboard.invoices.show', $invoice));
});

Breadcrumbs::for('dashboard.invoices.edit', function ($breadcrumb, $invoice) {
    $breadcrumb->parent('dashboard.invoices.show', $invoice);
    $breadcrumb->push(trans('invoices.actions.edit'), route('dashboard.invoices.edit', $invoice));
});
