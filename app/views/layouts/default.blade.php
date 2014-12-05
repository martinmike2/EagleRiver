<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
		<script src="{{asset('js/bootstrap.min.js') }}"></script>
	</head>
	<body>
		<ul class="nav nav-pills">
			<li><a href="/employees">Home</a></li>
			<li><a href="/logout">Logout</a></li>
		</ul>
		<div class="container">
			@yield('content')
		</div>
	</body>
</html>