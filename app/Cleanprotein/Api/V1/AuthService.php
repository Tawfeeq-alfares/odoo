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

class AuthService extends ApiBaseController
{

    use OdooConiction, Message;

    protected $model_name = '';
    protected $options     = [];

    /**
     * roles for validate.
     *
     * @return array
     */
    public function loginRoles(){
        return [
        ];
    }

    /**
     * register function.
     *
     * @return user opject
     */
    public function register($request)
    {   

        $odoo = $this->coniction();

        $data = $request->all();

        $data['avatar_1920'] = "data:image;base64,".base64_encode(file_get_contents($request->file('avatar_1920')));

        $partner = $odoo->model('res.partner')->create([
            'name' => $data['name'],
            'avatar_1920' => $data['avatar_1920'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
        ]);

        $success['partner'] = $partner;
        return $this->successResponse($success);
    }
    // register

    /**
     * login function.
     *
     * @return user opject
     */
    public function login($request)
    {   

        $odoo = $this->coniction();

        $partner = $odoo
        ->fields(['id', 'avatar_1920', 'lang', 'name', 'street_name', 'street_number', 'street_number2', 'city_id', 'currency_id', 'date_localization', 'contact_address', 'partner_latitude', 'partner_longitude', 'email', 'mobile'])
        ->model('res.partner')
        ->where('mobile' , '=' , $request['mobile'])
        ->first();

        $success['partner'] = $partner;
        return $this->successResponse($success);
    }
    // login

    /**
     * addLocation function.
     *
     * @return user opject
     */
    public function addLocation($request)
    {   

        $odoo = $this->coniction();

        $data = $request->all();

        $partner = $odoo->model('res.partner')
        ->where('mobile' , '=' , $request['mobile'])
        ->update([
            'partner_latitude' => $data['partner_latitude'],
            'partner_longitude' => $data['partner_longitude'],
            'street_name' => $data['street_name'],
            'street_number' => $data['street_number'],
            'contact_address' => $data['contact_address'],
        ]);

        $success['partner'] = $partner;
        return $this->successResponse($success);
    }
    // addLocation

    /**
     * profile function.
     *
     * @return user opject
     */
    public function profile($request)
    {   

        $odoo = $this->coniction();

        $partner = $odoo
        ->fields(['id', 'avatar_1920', 'lang', 'name', 'street_name', 'street_number', 'street_number2', 'city_id', 'currency_id', 'date_localization', 'contact_address', 'partner_latitude', 'partner_longitude', 'email', 'mobile'])
        ->model('res.partner')
        ->where('mobile' , '=' , $request['mobile'])
        ->first();

        $success['partner'] = $partner;
        return $this->successResponse($success);
    }
    // profile
    
}

