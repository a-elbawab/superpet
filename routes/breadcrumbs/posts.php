<?php

Breadcrumbs::for('dashboard.posts.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('posts.plural'), route('dashboard.posts.index'));
});

Breadcrumbs::for('dashboard.posts.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.posts.index');
    $breadcrumb->push(trans('posts.trashed'), route('dashboard.posts.trashed'));
});

Breadcrumbs::for('dashboard.posts.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.posts.index');
    $breadcrumb->push(trans('posts.actions.create'), route('dashboard.posts.create'));
});

Breadcrumbs::for('dashboard.posts.show', function ($breadcrumb, $post) {
    $breadcrumb->parent('dashboard.posts.index');
    $breadcrumb->push($post->name, route('dashboard.posts.show', $post));
});

Breadcrumbs::for('dashboard.posts.edit', function ($breadcrumb, $post) {
    $breadcrumb->parent('dashboard.posts.show', $post);
    $breadcrumb->push(trans('posts.actions.edit'), route('dashboard.posts.edit', $post));
});
