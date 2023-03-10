<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OdooController extends Controller
{
    public function index(){
        
        $this->config['database'] = 'cleanprotein-apps-7478322';
        $this->config['host']     = 'https://cleanprotein-apps-7478322.dev.odoo.com';
        $this->config['username'] = 'Abdoo.lafi14@gmail.com';
        $this->config['password'] = 'A1234';

        $odoo    = new \Obuchmann\LaravelOdooApi\Odoo($this->config);
        $version = $odoo->version();
        $content = $odoo->connect();
        $userId  = $odoo->getUid();

        // $models = $odoo->model('ir.model')
        // ->get();

        // $user = $odoo
        // ->model('res.partner')
        // ->create(['name' => 'Tawfeeq Alfares']);
        
        $uid = $odoo->authenticate($this->config['database'],'Abdoo.lafi14@gmail.com', 'A1234', array());

        $user = $odoo
        ->model('res.users')
        ->where('id' , '=' , $uid)
        ->first();

        $countries = $odoo
        ->model('res.partner')
        ->get();

        $cities = $odoo
        ->model('res.x_custom_model')
        ->get();

        // $subscribertions = $odoo->model('res.users')
        // ->get(); 

        // $customers = $odoo->model('res.partner')
        // ->get();
        return $countries;
        dd($subscribertions);

        $user = $odoo
        ->model('res.users')
        ->where('id' , '=' , $uid)
        ->first();

        $partners = $odoo
        ->model('res.partner')
        ->get();
        return($user);
        // $users = $odoo
        // ->model('res.users')
        // ->get();

        // $partner = $odoo
        // ->model('res.contact')
        // ->get();

        // $countries = $odoo
        // ->model('res.country')
        // ->get();
        
        $subscribertions = $odoo->model('sale.order')
        ->get();

        // $subscribertions = $odoo->model('sale.meal')
        // ->get();
    }
}
