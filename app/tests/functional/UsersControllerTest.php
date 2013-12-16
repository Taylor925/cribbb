<?php

class UsersControllerTest extends TestCase 
{
	
	/*public function setUp()
	{
		parent::setUp();

		$this->mock('Cribbb\Storage\User\UserRepository');
	}

	public function mock($class)
	{
		$mock = Mockery::mock($class);

		$this->app->instance($class, $mock);

		return $mock;
	}

	public function tearDown()
	{
		Mockery::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once();
	}*/

	public function testCreate()
	{
		$this->call('GET', 'users/create');

		$this->assertResponseOk();
	}
}