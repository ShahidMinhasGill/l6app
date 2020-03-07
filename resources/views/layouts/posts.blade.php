<!DOCTYPE html>
<html>
<head>
	<title>l6App</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
	@yield('content')
	@if($messege=Session::get('messege'))
{{$messege}}
@endif
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>