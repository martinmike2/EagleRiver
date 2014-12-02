<?php

class Employee extends Eloquent {
	
	protected $table = 'employees';
	protected $fillable = array('name', 'email');
	
	public function vacations()
	{
		return $this->hasMany('Vacation');
	}
}