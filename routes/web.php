<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OdooController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/index' , [OdooController::class , 'index']);

// Route::get('/', function () {
//     $odoo = new \Obuchmann\LaravelOdooApi\Odoo();
//     $version = $odoo->version();
//     $content = $odoo = $odoo->connect();
//     $userId = $odoo->getUid();

//     $user = $odoo
//     ->model('res.users')
//     ->where('id' , '=' , $userId)
//     ->get();

//     // $user = $odoo
//     // ->model('res.partner')
//     // ->create(['name' => 'Tawfeeq Alfares']);

//     dd('d');
// });
