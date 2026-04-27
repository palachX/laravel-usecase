<?php

declare(strict_types=1);

namespace App\UseCases\FetchUserList;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class FetchUserListDataOutput extends Data
{
    /**
     * @param  Collection<int, UserData>  $data
     */
    public function __construct(
        public readonly Collection $data
    ) {}
}
