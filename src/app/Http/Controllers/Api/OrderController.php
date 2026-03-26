<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\UseCases\Orders\StoreOrderDataInput;
use App\UseCases\Orders\StoreOrderHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function store(StoreOrderDataInput $dataInput, StoreOrderHandler $handler): JsonResponse
    {
        return new JsonResponse($handler->handle($dataInput)->wrap('data'));
    }
}
