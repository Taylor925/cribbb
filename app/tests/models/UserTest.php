<?php

	class UserTest extends TestCase {

		// public function testThatTrueIsTrue(){

		// 	$this->assertTrue(true);
		// }

		public function testUsernameIsRequired()
		{

			$user = new User;
			$user->email = "dave.rome.925@gmail.com";
			$user->password = "deadgiveaway";
			$user->password_confirmation = "deadgiveaway";

			//User should not save here
			$this->assertFalse($user->save());

			//Save the errors
			$errors = $user->errors()->all();

			//There should be one error
			$this->assertCount(1, $errors);

			//The username error should be set
			$this->assertEquals($errors[0],"The username field is required.");
		}

		// public function testUserIdIsRequired()
		// {
		// 	//Create new post
		// 	$post = new Post;

		// 	//Set the body
		// 	$post->body = "Yada yada yada";

		// 	$
		// }


	}