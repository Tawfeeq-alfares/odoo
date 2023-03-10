<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cleanprotein\Api\V1\AuthService;
use Exception;

class AuthController extends ApiBaseController
{

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * register function.
     *
     * @return opject
     */
    public function register(Request $request)
    {
        try {
            return $this->authService->register($request);
        } catch (Exception $e) {
            return $e;
            return $this->errorResponse($e);
        }
    }
    // register

    /**
     * login function.
     *
     * @return opject
     */
    public function login(Request $request)
    {
        try {
            return $this->authService->login($request);
        } catch (Exception $e) {
            return $e;
            return $this->errorResponse($e);
        }
    }
    // login

    /**
     * addLocation function.
     *
     * @return opject
     */
    public function addLocation(Request $request)
    {
        try {
            return $this->authService->addLocation($request);
        } catch (Exception $e) {
            return $e;
            return $this->errorResponse($e);
        }
    }
    // addLocation

    /**
     * profile function.
     *
     * @return opject
     */
    public function profile(Request $request)
    {
        try {
            return $this->authService->profile($request);
        } catch (Exception $e) {
            return $e;
            return $this->errorResponse($e);
        }
    }
    // profile
    
}
