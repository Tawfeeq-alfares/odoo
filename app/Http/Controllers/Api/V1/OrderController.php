<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cleanprotein\Api\V1\OrderService;
use Exception;

class OrderController extends ApiBaseController
{

     public function __construct()
    {
        $this->orderService = new OrderService();
    }

    /**
     * index function.
     *
     * @return opject
     */
    public function index(Request $request)
    {
        try {
            return $this->orderService->index($request);
        } catch (Exception $e) {
            return $e;
            return $this->errorResponse($e);
        }
    }
    // index

}
