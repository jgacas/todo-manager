<?php

/*
 * Vezba 4. PHP framework
 * 	- napraviti novu akciju akciju i kontroler
 */

// app/controllers/FirstController.php

class GreetingController extends BaseController
{
	public function  showGreeting()
	{
		return 'Greetings! This is ToDo Manager...';
	}
}