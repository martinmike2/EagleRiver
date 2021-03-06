@extends('layouts.default')

@section('content')
<h3>New Employee</h3>
	{{Form::open(['route'=>['employees.store']])}}
		<table class="table">
			<tr><td>{{Form::label('firstName', 'First Name')}}:</td><td>{{Form::text('firstName')}}</td><td>{{$errors->first('firstName')}}</td></tr>
			<tr><td>{{Form::label('lastName', 'Last Name')}}:</td><td>{{Form::text('lastName')}}</td><td>{{$errors->first('lastName')}}</td></tr>
			<tr><td>{{Form::label('employeeGender', 'Gender')}}:</td><td>{{Form::select('employeeGender', array('M'=>'M','F'=>'F'), 'M')}}</td><td>{{$errors->first('employeeGender')}}</td></tr>
			<tr><td>{{Form::label('dateOfHire', 'Hire Date')}}:</td><td>{{Form::input('date', 'dateOfHire')}}</td><td>{{$errors->first('dateOfHire')}}</td></tr>
			<tr><td>{{Form::label('terminationDate', 'Termination Date')}}:</td><td>{{Form::input('date', 'terminationDate')}}</td></tr>
		</table>
		{{Form::submit('Update')}}
	{{Form::close()}}
@stop