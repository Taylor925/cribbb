<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class CliqueTest extends TestCase {

	/**
		 * Test a user can follower other users
		 */
		public function testUserCanFollowerUsers()
		{
			//create users
			$philip = FactoryMuff::create('User');
			$jack = FactoryMuff::create('User');
			$ev = FactoryMuff::create('User');
			$biz = FactoryMuff::create('User');

			// First set
			$philip->follow()->save($jack);

			//First tests
			$this->assertCount(1, $philip->follow);
			$this->assertCount(0, $philip->followers);

			//Second set
			$jack->follow()->save($ev);
			$jack->follow()->save($biz);

			//Second tests
			$this->assertCount(2, $jack->follow);
			$this->assertCount(1, $jack->followers);

			//Third set
			$ev->follow()->save($jack);
			$ev->follow()->save($philip);
  			$ev->follow()->save($biz);

  			// Third tests
		    $this->assertCount(3, $ev->follow);
		    $this->assertCount(1, $ev->followers);

		    // Fourth set
			$biz->follow()->save($jack);
			$biz->follow()->save($ev);

			// Fourth tests
			$this->assertCount(2, $biz->follow);
			$this->assertCount(2, $biz->followers);

		}


	public function testCliqueUserRelationship(){

		//create clique
		$clique = FactoryMuff::create('Clique');

		//create two users
		$user1 = FactoryMuff::create('User');
		$user2 = FactoryMuff::create('User');

		//Save Users to the Clique
		$clique->users()->save($user1);
		$clique->users()->save($user2);

		// Count number of users
		$this->assertCount(2, $clique->users);

	}

	/**
	 * Test adding new comment
	 */
	public function testAddingNewComment()
	{
		//Create a new Post
		$post = FactoryMuff::create('Post');

		//Create new comment
		$comment = new Comment(array('body' => 'A new comment.'));

		//Save the comment to the Post
		$post->comments()->save($comment);

		// This Post should have one comment
		$this->assertCount(1, $post->comments);
	}

}