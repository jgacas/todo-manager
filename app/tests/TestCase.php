<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	protected $useDatabase = true;

	protected $user;

	/**
	 * Creates the application.
	 *
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

	/**
	 * Sets up tesing environment before each test.
	 */
	public function setUp()
	{
		parent::setUp();

		$user = new User(array(
				'id' => '1',
				'first_name' => 'John',
				'last_name' => 'Doe',
				'email'		=> 'john.d@vivifyideas.com',
				'password'	=> Hash::make('funfunfun')
			));
		
		if ($this->useDatabase)
		{
			$this->prepareDatabase();
		}
	}

	/**
	 * Cleans up after each test.
	 */
	public function teardown()
	{
		Artisan::call('migrate:reset');
	}

	private function prepareDatabase()
	{
		Artisan::call('migrate');
		Artisan::call('db:seed');
	}
}
