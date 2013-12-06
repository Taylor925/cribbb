<?php
//use LaravelBook\Ardent\Ardent;
use Magniloquent\Magniloquent\Magniloquent;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Magniloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');


	/**
	 * Protect against mass assignment
	 */
	protected $fillable = array('username','email');


	/**
	 * Also protects against mass assignment
	 */
	protected $guarded = array('id','password');


	/**
	 * Validation Rules
	 */

	public static $rules = array(
	  "save" => array(
	    'username' => 'required|min:4',
	    'email' => 'required|email',
	    'password' => 'required|min:8'
	  ),
	  "create" => array(
	    'username' => 'unique:users',
	    'email' => 'unique:users',
	    'password' => 'confirmed',
	    'password_confirmation' => 'required|min:8'
	  ),
	  "update" => array()
	);

	/**
	 * Auto Purge Redundant Data
	 */

	public $autoPurgeRedundantAttributes = true;

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Posts relationship
	 */
	public function posts(){
		return $this->hasMany('Post');
	}

}