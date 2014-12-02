@extends('layouts.default')

@section('content')

	<div>
		<h2>Employees</h2>
		<table class="table">
			<thead>
				<th>Name</th><th>Gender</th><th>Hire Date</th><th>Terminated</th><th>Actions</th>
			<thead>
			<tbody>
			@foreach($employees as $employee)
				<tr>
					<td><strong>{{{$employee->firstName}}} {{{$employee->lastName}}}</strong></td>
					<td>{{{ $employee->employeeGender }}}</td>
					<td>{{ date("d-m-Y", strtotime($employee->dateOfHire)) }}</td>
					@if($employee->terminationDate != '0000-00-00 00:00:00')
						<td>{{ date("d-m-Y", strtotime($employee->terminationDate)) }}</td>
					@else
						<td>Employed</td>
					@endif	
					<td>{{HTML::linkRoute('employees.edit', 'Edit', [$employee->id])}}</td>
				</tr>
			@endforeach
			</tbody>
			<tfooter>
				{{HTML::link('employees/create', 'Add New Employee')}}
			</tfooter>
		</table>
	</div>
		
@stop