@extends('main')
@section('title', '| Work Period')

@section('content')
<div id="schedule">
	<ul>
		<li class="header">Your Details</li>
		<li class="odd">Email: {{ $user->email }}</li>
		<li class="even">Name: {{ $user->name }}</li>
		<li class="odd">Date of Birth: {{ date('d/m/Y', strtotime($user->dob)) }}</li>
		<li class="even">Phone: {{ $user->phone }}</li>
		<li class="odd">Mobile: {{ $user->mobile }}</li>
	</ul>
	<a class="button magenta" href="edit-user">Change Details</a>
</div>
@endsection