<?php namespace Vinil\Http\Controllers;

use Vinil\Http\Requests;
use Vinil\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Vinil\User;

class RegistrationController extends Controller {

	public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            return redirect('auth/login')->withErrors(['Mensaje Vinil-Shirt', 'No hay codigo de confirmacion']);
        }

        $user = User::where('confirmation_code', $confirmation_code)->get()->first();
        
        if (!$user)
        {
            return redirect('auth/login')->withErrors(['Mensaje Vinil-Shirt', 'No hay ningun usuario asociado a este codigo']);
        }else {
        	$user->confirmed = 1;
	        $user->confirmation_code = null;
	        $user->save();
        }

       

        return redirect('home');
    }

}
