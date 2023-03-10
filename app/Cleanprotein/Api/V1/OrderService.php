<?php

namespace Cleanprotein\Api\V1;

use App\Http\Controllers\ApiBaseController;
// http
use Illuminate\Http\JsonResponse;
// supports
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// trates
use Cleanprotein\Traits\OdooConiction;
use Cleanprotein\Traits\Message;

class OrderService extends ApiBaseController
{

    use OdooConiction, Message;

    protected $model_name = '';
    protected $options     = [];

    /**
     * roles for validate.
     *
     * @return array
     */
    public function orderRoles(){
        return [
        ];
    }

    /**
     * index function.
     *
     * @return user opject
     */
    public function index($request)
    {   

        $odoo = $this->coniction();

        $data = $request->all();

        $orders = $odoo
        ->model('res.sale.order')
        ->setMethod('search')
        ->addResponseClass(Odoo\Response\ListResponse::class)
        ->get();

        $success['orders'] = $orders;
        return $this->successResponse($success);
    }
    // index
    
}

