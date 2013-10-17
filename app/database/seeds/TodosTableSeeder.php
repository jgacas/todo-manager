<?php

class TodosTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('todos')->delete();
		
		Todo::create(array(
			'title' => 'write tests for rest api', 
			'completed' => '0', 
			'importance' => '0'
			)
		);
	}
}