<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class PostTest extends TestCase {
	
	/**
	 * Test realtionship with User
	 */
	 public function testRelationshipWithUser(){
	 	
	 	//Instantiate new Post
	 	$post = FactoryMuff::create('Post');

	 	$this->assertEquals($post->user_id, $post->user->id);

	 }

	 /* 
	  * Test that user_id is required
	  */

	 public function testUserIdRequired(){

	 	//Create new post
	 	$post = new Post;

	 	//set body
	 	$post->body = "Yada yada yada";

	 	//Post should not save
	 	$this->assertFalse($post->save());

	 	//Save the errors
	 	$errors = $post->errors()->all();

	 	// There should be 1 error
	 	$this->assertCount(1, $errors);

	 	// The error should be set
	 	$this->assertEquals($errors[0], "The user id field is required.");

	 }

	 /**
	  * Test post body is required
	  */

	 public function testPostBodyIsRequired()
	 {

	 	//Create new post
	 	$post = new Post;

	 	//Create a User
	 	$user = FactoryMuff::create('User');

	 	//Post should not save
	 	$this->assertFalse($user->posts()->save($post));

	 	//Save the errors
	 	$errors = $post->errors()->all();

	 	// There should be one error
	 	$this->assertCount(1, $errors);

	 	//The error should be set
	 	$this->assertEquals($errors[0], "The body field is required.");	 	
	 }

	 /**
	  * Test Posts save correctly
	  */
	 public function testPostSavesCorrectly()
	 {
	 	//Create a new Post
	 	$post = FactoryMuff::create('Post');

	 	//Save the Post
	 	$this->assertTrue($post->save());
	 }
}