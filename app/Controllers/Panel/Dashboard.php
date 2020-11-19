<?php namespace App\Controllers\Panel;

use App\Controllers\BaseController;


class Dashboard extends BaseController
{


	public function index()
	{		

		$data = ['uri' => service('uri')];
        
		return view('panel/dashboard', $data);
	
	}

	//--------------------------------------------------------------------

}
