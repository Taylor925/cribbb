<?php namespace Cribbb\Services\Validators;

class User extends Validator {
	
		/**
		 * Validation Rules
		 */

	public static $rules = array(
		'username' => 'required',
		'email' => 'required|email',
		'password' => 'required|min:8|confirmed',
		'password_confirmation' => 'required|min:8'
	);
}