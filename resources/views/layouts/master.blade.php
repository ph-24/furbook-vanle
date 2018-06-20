<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Furbook</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				@yield('header')
			</div>
			@if (session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
			@endif
			@yield('content')

		</div>
	</body>
</html>
