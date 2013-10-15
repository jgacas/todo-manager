<?php

class TodoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Todo::all()->toJson();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$todo = Todo::create(Input::json()->all());
		return $todo->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$todo = Todo::find($id);
		if (is_null($todo)) 
		{
			Response::json('Todo not found', 404);
		}
		$todo->update(Input::json()->all());

		return $todo->toJson();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$todo = Todo::find($id);
		if (is_null($todo)) 
		{
			Response::json('Todo not found', 404);
		}
		$deleted = $todo;
		$todo->delete();

		return $deleted->toJson();
	}

}