<?php

// Integration tests for REST API.
class RestApiTest extends TestCase {

	protected $useresponseDatabase = true;

	public function testGetAllTodos()
	{
		$response = $this->call('GET', 'todos');

		// assert response
		$responseData = json_decode($response->getContent());
		$this->assertResponseOk($response);
		$this->assertEquals(1, count($responseData));
		$this->assertEquals('write tests for rest api', $responseData[0]->title);
		$this->assertEquals('0', $responseData[0]->completed);
		$this->assertEquals('0', $responseData[0]->importance);

		// assert database
		$dbData = Todo::all();
		$this->assertEquals(1, count($dbData));
		$this->assertEquals('write tests for rest api', $dbData[0]->title);
		$this->assertEquals('0', $dbData[0]->completed);
		$this->assertEquals('0', $dbData[0]->importance);		
	}

	public function testPostTodo()
	{
		$postresponseData = json_encode(array(
			'title' => 'read javascript book',
			'completed' => '0',
			'importance' => '1'
		));
		$response = $this->call('POST', 'todos', [], [], []	, $postresponseData);

		// assert response
		$responseresponseData = json_decode($response->getContent());

		$this->assertResponseOk($response);
		$this->assertEquals('read javascript book', $responseresponseData->title);
		$this->assertEquals('0', $responseresponseData->completed);
		$this->assertEquals('1', $responseresponseData->importance);

		// assert responseDatabase
		$dbresponseData = Todo::find(2);
		$this->assertEquals('read javascript book', $responseresponseData->title);
		$this->assertEquals('0', $responseresponseData->completed);
		$this->assertEquals('1', $responseresponseData->importance);		
	}

	public function testUpdateTodo()
	{
		$postresponseData = json_encode(array(
			'id' => '1',
			'title' => 'learn angularjs',
			'completed' => '1',
			'importance' => '0'
		));

		// assert response
		$response = $this->call('PUT', 'todos/1', [], [], [], $postresponseData);
		$responseresponseData = json_decode($response->getContent());

		$this->assertResponseOk($response);
		$this->assertEquals('learn angularjs', $responseresponseData->title);
		$this->assertEquals('1', $responseresponseData->completed);
		$this->assertEquals('0', $responseresponseData->importance);

		// assert responseDatabase
		$dbresponseData = Todo::find(1);

		$this->assertEquals('learn angularjs', $dbresponseData->title);
		$this->assertEquals('1', $dbresponseData->completed);
		$this->assertEquals('0', $dbresponseData->importance);		
	}

	public function testDeleteTodo()
	{
		$response = $this->call('DELETE', 'todos/1');

		// assert
		$responseresponseData = json_decode($response->getContent());

		$this->assertResponseOk($response);
		$this->assertEquals('1', $responseresponseData->id);
		$this->assertEquals('write tests for rest api', $responseresponseData->title);
		$this->assertEquals('0', $responseresponseData->completed);
		$this->assertEquals('0', $responseresponseData->importance);

		// assert responseDatabase
		$dbresponseData = Todo::find(1);
		$this->assertEquals(null, $dbresponseData);
	}
}