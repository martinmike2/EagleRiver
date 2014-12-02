@extends('layouts.default')

@section('content')
<h3>Employee</h3>
	{{Form::model($employee, ['route'=>['employees.update', $employee->id], 'method' => 'patch'])}}
		<table class='table'>
			<tr><td>{{Form::label('firstName', 'First Name')}}:</td><td>{{Form::text('firstName')}}</td></tr>
			<tr><td>{{Form::label('lastName', 'Last Name')}}:</td><td>{{Form::text('lastName')}}</td></tr>
			<tr><td>{{Form::label('employeeGender', 'Gender')}}:</td><td>{{Form::select('employeeGender', array('M'=>'M','F'=>'F'), 'M')}}</td></tr>
			<tr><td><strong>Date of Hire</strong>:</td><td>{{ date('d-m-y', strtotime($employee->dateOfHire))}}</td></tr>
			<tr><td><strong>Termination Date</strong>:</td>
					@if($employee->terminationDate != '0000-00-00 00:00:00')
						<td>{{ date("d-m-Y", strtotime($employee->terminationDate)) }}</td>
					@else
						<td>Employed</td>
					@endif	
			</tr>
		</table>
		<h3>Vacations</h3>
		<table class='table'>
			<thead>
				<th>Start Date</th><th>Number of Days</th>
			</thead>
			<tbody>
			@foreach($employee->vacations as $vacation)
				<tr>
					<td>{{{date('d-m-y', strtotime($vacation->startDate))}}}</td>
					<td>{{{ $vacation->noOfDays }}}</td>
				</tr>
			@endforeach
			</tbody>
			<tfooter>
				{{HTML::link('vacations/save/'.$employee->id, 'Add Vacation', ['class'=>'btn'])}}
			</tfooter>
		</table>
		
		{{Form::submit('Update')}}
	{{Form::close()}}
@stop