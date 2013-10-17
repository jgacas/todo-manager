<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	protected $useDatabase = true;

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
