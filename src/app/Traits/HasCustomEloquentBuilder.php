<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasCustomEloquentBuilder
{
    /**
     * Путь к папке с билдерами
     */
    private const string ELOQUENT_BUILDER_PATH = 'EloquentBuilders';

    /**
     * Метод для создания билдера
     *
     * @return Builder<static>
     */
    public function newEloquentBuilder($query): Builder
    {
        /** @var Builder<static> */
        return new (str_replace('Models', self::ELOQUENT_BUILDER_PATH, static::class).'Builder')($query);
    }
}
