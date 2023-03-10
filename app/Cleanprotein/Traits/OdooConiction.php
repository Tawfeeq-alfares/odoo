<?php

namespace Cleanprotein\Traits;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

trait OdooConiction
{
	public $config = [];

	public function coniction(){

		$this->config['database'] = 'cleanprotein-apps-7478322';
        $this->config['host']     = 'https://cleanprotein-apps-7478322.dev.odoo.com';
        $this->config['username'] = 'Abdoo.lafi14@gmail.com';
        $this->config['password'] = 'A1234';
	    
	    $odoo    = new \Obuchmann\LaravelOdooApi\Odoo($this->config);
	    
	    $version = $odoo->version();
	    $content = $odoo->connect();
	    $userId  = $odoo->getUid();
	    
	    $uid = $odoo->authenticate($this->config['database'],'Abdoo.lafi14@gmail.com', 'A1234', array());
	    
	    return $odoo;
	}
	
}
