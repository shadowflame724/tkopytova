<?php

Breadcrumbs::for('admin.portfolio-category.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Управление категориями', route('admin.portfolio-category.index'));
});

Breadcrumbs::for('admin.portfolio-category.create', function ($trail) {
    $trail->parent('admin.portfolio-category.index');
    $trail->push('Добавить категорию', route('admin.portfolio-category.create'));
});

Breadcrumbs::for('admin.portfolio-category.edit', function ($trail, $id) {
    $trail->parent('admin.portfolio-category.index');
    $trail->push('Редактировать категорию', route('admin.portfolio-category.edit', $id));
});
