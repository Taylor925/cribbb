<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/test', function(){
	echo Supyo::greeting();
});

Route::get('/user', function()
{
	/*$user = new User;
	$user->username = 'sloshDev';
	$user->email = 'dave.rome.925@gmail.com';
	$user->password = 'deadgiveaway';
	$user->password_confirmation = 'deadgiveaway';
	var_dump($user->save());	*/

	// //Create a new Post
	// $post = new Post(array('body' => 'Yada yada yada'));
	// //Grab User 1
	// $user = User::find(1);
	// //Save the Post
	// $user->posts()->save($post);

	// //Create User 1
	// $user1 = new User();
	// $user1->username = "philipbrown";
	// $user1->email = "phil@ipbrown.com";
	// $user1->password = "password";
	// $user1->password_confirmation = "password";
	// $user1->save();

	// // Create User 2
	//   $user2 = new User();
	//   $user2->username = "jack";
	//   $user2->email = "jack@twitter.com";
	//   $user2->password = "squareup";
	//   $user2->password_confirmation = "squareup";
	//   $user2->save();

	//  $user1->follow()->save($user2);

	//   // Create User 3
	//   $user3 = new User();
	//   $user3->username = "ev";
	//   $user3->email = "ev@twitter.com";
	//   $user3->password = "pyralabs";
	//   $user3->password_confirmation = "pyralabs";
	//   $user3->save();

	//   // Make User 1 follow User 3
 //  	 $user1->follow()->save($user3);

	  // Find User 1
	  $philip = User::find(2);	  
	 
	  // Display who User 1 is following
	  foreach ($philip->follow as $user)
	  {
	    echo $user->username . "<br>";
	  }
	   
	  // Find User 2
	  $jack = User::find(3);
	   
	  // Display who is following User 2
	  foreach ($jack->followers as $user)
	  {
	    echo $user->username . "<br>";
	  }
	
});