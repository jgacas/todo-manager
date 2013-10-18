<?php

// app/controllers/TodoController.php

/**
 * Implementation of RESTful API for handling todo list.
 */
class TodosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(User::find(Auth::user()->id)->todos, 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::json()->all();
		$data['user_id'] = Auth::user()->id;
		$todo = Todo::create($data);
		
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