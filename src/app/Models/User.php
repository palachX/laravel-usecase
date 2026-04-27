<?php

declare(strict_types=1);

namespace App\Models;

use App\EloquentBuilders\UserBuilder;
use App\Traits\HasCustomEloquentBuilder;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * User model
 *
 * @property int $id
 * @property string $name
 * @property bool $is_active
 *
 * @method static UserBuilder query()
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasCustomEloquentBuilder;

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
    ];
}
