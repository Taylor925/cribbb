<?php

use Magniloquent\Magniloquent\Magniloquent;

class Post extends Magniloquent {

	protected $fillable = array('body');

	public function user(){

		return $this->belongsTo('User');

	}

}