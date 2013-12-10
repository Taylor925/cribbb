<?php 

use Magniloquent\Magniloquent\Magniloquent;

class Comment extends Magniloquent {

	/**
	 * Properties that can be mass assigned
	 */
	protected $fillable = array('body');

	/**
	 * Magniloquent validation rules
	 */
    public static $rules = array(
    	"save"=>array(
    		"body" => "required"
    		),
    	"create"=>array(
    		"body" => "required"
    		),
    	"update"=>array()
    );
	
	//Polymorphic abilities
	public function commentable()
	{
		return $this->morphTo();
	}

}