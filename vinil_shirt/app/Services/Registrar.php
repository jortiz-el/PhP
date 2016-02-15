<?php namespace Vinil\Services;

use Vinil\User;
use Vinil\Profiles;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Mail;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$confirmation_code = str_random(30);

		$user = User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'confirmation_code' => $confirmation_code,
		]);

		$profile = new Profiles;
		$profile->user_id = $user->id;
		$profile->acerca = "";
		$profile->save();


		$data['confirmation_code'] = $confirmation_code;

		Mail::send('emails.verify', $data, function($message) use ($data)
            {
                $message->from('no-reply@Vinil-Shirt.com', "Vinil-Shirt");
                $message->subject("Welcome to Vinil-Shirt");
                $message->to($data['email']);
            });


		return $user;
	}

}
