@extends('main')
@section('title', '| User Update')

@section('stylesheets')
	{!! Html::style('js/css/ui.core.css') !!}
	{!! Html::style('js/css/ui.theme.css') !!}
	{!! Html::style('js/css/ui.datepicker.css') !!}
@endsection

@section('content')
{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
<ul>
	<fieldset>
		<legend>Personel Information</legend>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>
		<li>
			{{ Form::label('dob', 'DOB:') }}
			{{ Form::text('dob', date('d/m/Y', strtotime($user->dob)), ['autocomplete' => 'off']) }}
		</li>
	</fieldset>
	<fieldset>
		<legend>Contact Information</legend>
		<li>
			{{ Form::label('phone', 'Phone:') }}
			{{ Form::tel('phone') }}
		</li>
		<li>
			{{ Form::label('mobile', 'Mobile:') }}
			{{ Form::tel('mobile') }}
		</li>
	</fieldset>
	<fieldset>
		<legend>Address</legend>
		<li>
			{{ Form::label('address', 'Address:') }}
			{{ Form::text('address') }}
		</li>
		<li>
			{{ Form::label('suburb', 'Suburb:') }}
			{{ Form::text('suburb') }}
		</li>
	</fieldset>
	<fieldset>
		<legend>Login Details</legend>
		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::email('email', null, ['class' => 'form-control']) }}
		</li>
		<li>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password', ['class' => 'form-control']) }}
		</li>
		<li>
			{{ Form::label('password_confirmation', 'Confirm Password:') }}
			{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
		</li>
	</fieldset>
	<li>
		{{ Form::button('Save', ['type' => 'submit']) }}
	</li>
</ul>
{!! Form::close() !!}
@endsection

@section('scripts')
	{!! Html::script('js/jquery-1.6.1.js') !!}
	{!! Html::script('js/ui/ui.datepicker.js') !!}
	{!! Html::script('js/signup.js') !!}
@endsection