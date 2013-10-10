<?php

class UserTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('users')->delete();
		
		DB::table('users')->insert(array(
			'first_name' => 'John',
			'last_name' => 'Doe',
			'email'		=> 'john.d@vivifyideas.com',
			'password'	=> Hash::make('funfunfun')
		));
	}
}