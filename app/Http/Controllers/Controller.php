<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function index() {
		return view('test');
	}
    public function showProfile($id)
    {
		echo $id;
        //$user = User::find($id);
        //return View::make('user.profile', array('user' => $user));
    }
}
