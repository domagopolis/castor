@extends('main')
@section('title', '| Homepage')

@section('content')
{!! Form::open(['method' => 'POST']) !!}
	<ul>
		<li>
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name') }}
		</li>
		<li>
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email') }}
		</li>
		<li>
			{{ Form::label('phone', 'Phone') }}
			{{ Form::text('phone') }}
		</li>
		<li>
			{{ Form::label('message', 'Message') }}
			{{ Form::textarea('message') }}
		</li>
		<li>
			{{ Form::button('Report', ['type' => 'submit']) }}
		</li>
	</ul>
{!! Form::close() !!}
@endsection