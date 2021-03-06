<?php

use Magniloquent\Magniloquent\Magniloquent;

class Post extends Magniloquent {

	protected $fillable = array('body');	

	public function user(){

		return $this->belongsto('User');

	}

	public static $rules = array(
	"save" => array(
	    'body' => 'required',
		'user_id' => 'required',
		'clique_id'	=> 'required',
	  ),
	  "create" => array(
	    'body' => 'required',
		'user_id' => 'required',
		'clique_id'	=> 'required',
	  ),
	  "update" => array()
		
	);

	public static $factory = array(
		'body' => 'text',
		'user_id' => 'factory|User',
		'clique_id' => 'factory|Clique',
	);


	/**
	 * Clique relationship
	 */
	public function clique()
	{
		return $this->belongsTo('Clique');
	}

	/**
	* Comment relationship	
	*/

	public function comments()
	{
		return $this->morphMany('Comment','commentable');
	}

}