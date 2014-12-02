<?php

use Illuminate\Support\Facades\Input;
class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//TODO: Validation
		$input = Input::all();
		
		if(Auth::attempt(['username'=>$input['username'],'password'=>$input['password']])) return Redirect::route('employees.index');
		
		return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		
		return Redirect::home();
	}


}
