<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cleanprotein\Api\V1\SubscriptionService;
use Exception;

class SubscriptionController extends ApiBaseController
{

    public function __construct()
    {
        $this->subscriptionService = new SubscriptionService();
    }

    /**
     * create page doctors function.
     *
     * @return view
     */
    public function index()
    {
        try {
            return $this->subscriptionService->index();
        } catch (Exception $e) {
            return $e;
            return $this->errorResponse($e);
        }
    }
    // index
}
