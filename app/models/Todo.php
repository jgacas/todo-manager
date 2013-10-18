<?php

class Todo extends Eloquent {

	/**
	 * The database table used by model.
	 *
	 * @var string
	 */
	protected $table = 'todos';

	/**
	 * Attributes that can be used in mass assignment.
	 *
	 * @var array
	 */
	protected $fillable = array('title', 'completed', 'importance', 'user_id');

	/**
	 * Todo entry belongs to one user - one to many relationship.
	 *
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}
}