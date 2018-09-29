<?php

Breadcrumbs::for('admin.portfolio.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Управление портфолио', route('admin.portfolio.index'));
});

Breadcrumbs::for('admin.portfolio.create', function ($trail) {
    $trail->parent('admin.portfolio.index');
    $trail->push('Добавить портфолио', route('admin.portfolio.create'));
});

Breadcrumbs::for('admin.portfolio.edit', function ($trail, $id) {
    $trail->parent('admin.portfolio.index');
    $trail->push('Редактировать портфолио', route('admin.portfolio.edit', $id));
});
