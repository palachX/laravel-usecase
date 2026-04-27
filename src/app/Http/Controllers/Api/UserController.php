<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\UseCases\FetchUserList\FetchUseListHandler;
use Illuminate\Http\JsonResponse;

class UserController
{
    public function index(FetchUseListHandler $fetchUseListHandler): JsonResponse
    {
        return new JsonResponse($fetchUseListHandler->handle());
    }
}
