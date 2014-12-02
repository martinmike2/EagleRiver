@extends('layouts.default')


@section('content')
<h1>Login</h1>
<div class="well">
{{ Form::open(array('route' => 'sessions.store')) }}
<table class="table">
	<tr>
		<td>{{ Form::label('username', 'Username') }}</td>
		<td>{{ Form::text('username') }}</td>
	</tr>
	<tr>
		<td>{{ Form::label('password', 'Password') }}</td>
		<td>{{ Form::password('password') }}</td>
	</tr>
	</table>
	{{ Form::submit() }}
{{ Form::close() }}
</div> 
@stop