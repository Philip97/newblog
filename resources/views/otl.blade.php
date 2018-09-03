<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
otl blade
</body>
</html>