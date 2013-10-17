<?php

// app/controllers/TodoController.php

/**
 * Implementation of RESTful API for handling todo list.
 */
class TodoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Todo::all(), 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$todo = Todo::create(Input::json()->all());
		
		return Response::json($todo, 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$todo = Todo::findOrFail($id);
		$todo->update(Input::json()->all());

		return Response::json($todo, 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$todo = Todo::findOrFail($id);
		$deleted = $todo;
		$todo->delete();

		return Response::json($deleted);
	}

}