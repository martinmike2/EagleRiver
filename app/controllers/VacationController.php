<?php

use Illuminate\Validation\Factory as Validator;
use Illuminate\Support\Facades\Redirect;

class VacationController extends \BaseController {

	/**
	 * Vacation validation rules
	 * @var unknown
	 */
	protected $rules = [
		'startDate' 	=> 	'required',
		'numOfDays'		=>	'required',
		'employee_id'	=>	'required'	
	];
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return View::make('vacations.create', ['employee_id' => $id]);
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$input = Input::all();
		try {
			$this->validate($input);
		} catch (Exception $e) {
			return Redirect::back();
		}	
		$vacation = new Vacation();
		$vacation->startDate = $input['startDate'];
		$vacation->noOfDays = $input['numOfDays'];
		$vacation->employee_id = $input['employee_id'];
		
		$vacation->save();
		
		return Redirect::route('employees.index');
	}
	
	/**
	 * Validates Vacation form data
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	protected function validate($data)
	{
		$validator = new Validator();
		$validation = $validator->make($data, $this->rules);
		
		if($validation->fails())
		{
			throw new Exception('Validation Failed');
		}
		
		return true;
	}
}
