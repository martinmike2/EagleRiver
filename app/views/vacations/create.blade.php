@extends('layouts.default')

@section('content')
	{{ Form::open(['route' => 'vacations.store']) }}
		<table class="table">
		{{Form::hidden('employee_id', $employee_id)}}
		<tr>
			<td>{{Form::label('startDate', 'Start Date')}}:</td>
			<td>{{Form::input('date', 'startDate')}}</td>
		</tr>
		<tr>
			<td>{{Form::label('numOfDays', 'Number of days requested')}}:</td>
			<td>{{Form::number('numOfDays')}}</td>
		</tr>
		</table>
		{{Form::submit('Submit')}}
	{{Form::close()}}
@stop