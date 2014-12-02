<?php

class Vacation extends Eloquent{
	
	protected $table = 'vacations';
	protected $fillable = array('start', 'end');
	
	public function employee()
	{
		return $this->belongsTo('Employee');
	}
}