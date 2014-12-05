<?php
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

		$validation = $this->validate($input);
		
		if($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation);
		}
		
		$vacation = new Vacation();
		$vacation->startDate = $input['startDate'];
		$vacation->noOfDays = $input['numOfDays'];
		$vacation->employee_id = $input['employee_id'];
		
		$vacation->save();
		
		return Redirect::route('employees.edit', ['employees'=>$input['employee_id']]);
	}
	
	/**
	 * Validates Vacation form data
	 * @param array $data
	 * @throws Exception
	 * @return Validator $validator
	 */
	protected function validate($data)
	{
		$validator = Validator::make($data, $this->rules);
		
		return $validator;
	}
}
