<?php

class TodosTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('todos')->delete();
		
		// $user_id = DB::table('users')->select('id')->where('email', 'john.d@vivifyideas.com');

		Todo::create(array(
			'title' 		=> 'write tests for rest api', 
			'completed'		=> '0', 
			'importance' 	=> '0',
			'user_id' 		=> '1'
		));
	}
}