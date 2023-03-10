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

class SubscriptionService extends ApiBaseController
{

    use OdooConiction, Message;

    protected $model_name = '';
    protected $options     = [];
    protected $subscription_id   = null;

    /**
     * get subscriptions function.
     *
     * @return view
     */
    public function index()
    {   

        $odoo = $this->coniction();

        $subscriptions = $odoo
        ->model('res.subscription')
        ->get();

        $success['subscriptions'] = $subscriptions;
        return $this->successResponse($success['subscriptions']);
    }
    // index

    /**
     * subscription lists function.
     *
     * @return json
     */
    public function subscriptionlists()
    {
        $success['list'];
        return $this->successResponse($success);
    }
    // createPage

    /**
     * create subscription function.
     *
     * @return json (subscription data)
     */
    public function create($request)
    {   
        $validator = Validator::make($request->all(), $this->createRoles());
        if ($validator->fails()){
            return $this->errorResponse($validator->errors());
        }

        $success['create'];
        return $this->successResponse($success);
    }
    // create

    /**
     * edit subscription function.
     *
     * @return json (subscription data)
     */
    public function view($subscription_id)
    {   
        $success['view'];
        return $this->successResponse($success);
    }
    // view

    /**
     * update doctors function.
     *
     * @return json (subscription data)
     */
    public function update($request)
    {   
        $validator = Validator::make($request->all(), $this->updateRoles());
        if ($validator->fails()){
            return $this->errorResponse($validator->errors());
        }

        $success['update'];
        return $this->successResponse($success);
       
    }
    // update
    
}

