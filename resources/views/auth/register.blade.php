@extends('main')

@section('title', '| Register')

@section('stylesheets')
	{!! Html::style('js/css/ui.core.css') !!}
	{!! Html::style('js/css/ui.theme.css') !!}
	{!! Html::style('js/css/ui.datepicker.css') !!}
@endsection

@section('content')
{!! Form::open() !!}
	<ul>
		<fieldset>
			<legend>Personel Information</legend>
			<li>
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name') }}
				@if ($errors->has('name'))
		  		<p class="error">{{ $errors->first('name') }}</p>
		    @endif
			</li>
			<li>
				{{ Form::label('dob', 'DOB:') }}
				{{ Form::text('dob', null, ['autocomplete' => 'off']) }}
				@if ($errors->has('dob'))
		    	<p class="error">{{ $errors->first('dob') }}</p>
		    @endif
			</li>
		</fieldset>
		<fieldset>
			<legend>Contact Information</legend>
			<li>
				{{ Form::label('phone', 'Phone:') }}
				{{ Form::tel('phone') }}
				@if ($errors->has('phone'))
		    	<p class="error">{{ $errors->first('phone') }}</p>
		    @endif
			</li>
			<li>
				{{ Form::label('mobile', 'Mobile:') }}
				{{ Form::tel('mobile') }}
				@if ($errors->has('mobile'))
		    	<p class="error">{{ $errors->first('mobile') }}</p>
		    @endif
			</li>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<li>
				{{ Form::label('address', 'Address:') }}
				{{ Form::text('address') }}
				@if ($errors->has('address'))
		    	<p class="error">{{ $errors->first('address') }}</p>
		    @endif
			</li>
			<li>
				{{ Form::label('location', 'Suburb:') }}
				{{ Form::text('location') }}
				@if ($errors->has('location'))
		    	<p class="error">{{ $errors->first('location') }}</p>
		    @endif
			</li>
		</fieldset>
		<fieldset>
			<legend>Login Details</legend>
			<li>
				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}
				@if ($errors->has('email'))
		    	<p class="error">{{ $errors->first('email') }}</p>
		    @endif
			</li>
			<li>
				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				@if ($errors->has('password'))
		    	<p class="error">{{ $errors->first('password') }}</p>
		    @endif
			</li>
			<li>
				{{ Form::label('password_confirmation', 'Confirm Password:') }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
			</li>
		</fieldset>
		<li>
			{{ Form::button('Register Now', ['type' => 'submit']) }}
		</li>
	</ul>
{!! Form::close() !!}
@endsection

@section('scripts')
	{!! Html::script('js/jquery-1.6.1.js') !!}
	{!! Html::script('js/ui/ui.datepicker.js') !!}
	{!! Html::script('js/signup.js') !!}
@endsection
