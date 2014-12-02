<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Factory as Validator;

class EmployeeController extends \BaseController {
	
	/**
	 * Validation Rules for Employees
	 * @var rules
	 */
	protected $rules = [
			'firstName'			=>	'required',
			'lastName'			=>	'required',
			'employeeGender'	=>	'required',
			'dateOfHire'		=>	'required'
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$employees = Employee::all();
		return View::make('employees.index', ['employees'=>$employees]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('employees.create');
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
		
		$employee = new Employee();
		$employee->firstName = $input['firstName'];
		$employee->lastName = $input['lastName'];
		$employee->employeeGender = $input['employeeGender'];
		$employee->dateOfHire = $input['dateOfHire'];
		$employee->terminationDate = $input['terminationDate'];
		
		$employee->save();
		
		return Redirect::route('employees.index');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try {
			$employee = Employee::findOrFail($id);
			return View::make('employees.edit', ['employee'=>$employee]);
			
		} catch (ModelNotFoundException $e) {
			return View::make('errors.model');
		}

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		
		try {
			$this->validate($input);
		} catch (Exception $e) {
			return Redirect::back();
		}
		
		try {
			$employee = Employee::findOrFail($id);
			
			$employee->firstName = $input['firstName'];
			$employee->lastName = $input['lastName'];
			$employee->employeeGender = $input['employeeGender'];
			$employee->dateOfHire = $input['dateOfHire'];
			$employee->terminationDate = $input['terminationDate'];
			
			$employee->save();
			
			return Redirect::route('employees.index');
			
		} catch (ModelNotFoundException $e) {
			return View::make('errors.model');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	/**
	 * Validates Employee form data
	 * @param array $data
	 * @return boolean
	 */
	public function validate(array $data)
	{
		$validator = new Validator();
		$validation = $validator->make($data, $this->rules);
		
		if($validation->fails())
		{
			throw new Exception('Validation failed');
		}
		
		return true;
		
	}

}
