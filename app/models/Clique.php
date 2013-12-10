<?php

use Magniloquent\Magniloquent\Magniloquent;

class Clique extends Magniloquent {

	/**
	 * User relationship
	 */
	public function users(){
		return $this->belongsToMany('User')->withTimestamps();
	}

	/**
	 * Post relationship
	 */
	public function posts()
	{
		return $this->hasMany('Post');
	}

	/**
	 * Factory
	 */
	public static $factory = array(
		'name' => 'string'
	);

	protected $fillable = array('name');

	public static $rules = array(
		"save" => array(
			'name' => 'required'
		),
		"create" => array(
			'name' => 'required'
		),
		"update" => array()
	);

}