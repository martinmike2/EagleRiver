<h1>Login</h1>
{{ FormLLopen(array('route' => 'sessions.store')) }}
<ul>
	<li>
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username') }}
	</li>
	
	<li>
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
	</li>
	
	<li>
		{{ Form::submit() }}
	</li>
</ul>
{{ Form::close() }} 