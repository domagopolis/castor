<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ app()->getLocale() }}">
	<head>
		@include('partials._head')
	</head>
	<body>
		<div id="header">
			<h1><a href="/">Castor</a></h1>
			@if (Auth::check())
			<a style="float: right;" class="button magenta" href="{{ route('logout') }}">Logout</a>
			@endif
		</div>
		<div id="content">
			@yield('content')
		</div>
		@yield('scripts')
	</body>
</html>