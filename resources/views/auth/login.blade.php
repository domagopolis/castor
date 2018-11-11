@extends('main')

@section('title', '| Login')

@section('content')
{!! Form::open() !!}
	<ul>
		<li>
			{{ Form::label('email', 'Email', ['class' => 'label blue']) }}
			{{ Form::email('email') }}
		</li>
		<li>
			{{ Form::label('password', 'Password', ['class' => 'label blue']) }}
			{{ Form::password('password') }}
		</li>
		<li>	
			{{ Form::button('Log in Now', ['type' => 'submit']) }}
		</li>
	</ul>
{!! Form::close() !!}
<div id="second-column">
	<p class="login"><img class="float-left" src="{{ asset('images/tools.gif') }}">First time user? Click <a href="{{ route('register') }}">here</a> to set up your account</p>
	<p class="login"><img class="float-left" src="{{ asset('images/monitor.gif') }}">Can't remember your log in info? Click <a href="{{ route('password.request') }}">here</a> for help</p>
	<p class="login"><img class="float-left" src="{{ asset('images/desk.gif') }}">To report an issue with Castor, click <a href="/report">here</a></p>
</div>
@endsection