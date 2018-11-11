@extends('main')
@section('title', '| Homepage')

@section('content')
<div id="navigation">
	<ul>
		<li id="right-aligned">
			<a href="{{ route('select-work.index') }}">Select Work</a>
			<img id="nav-calendar" src="{{ asset('images/calendar.gif') }}">
		</li>
		<li id="left-aligned">
			<a href="/trade_central">Trade Central</a>
			<img id="nav-trade" src="{{ asset('images/trade.gif') }}">
		</li>
		<li id="right-aligned">
			<a href="/user-details">Your Details</a>
			<img id="nav-address-book" src="{{ asset('images/address_book.gif') }}">
		</li>
	</ul>
</div>
@if (count($work_period_slots))
<div id="schedule">
	<ul>
		<li class="header">Today: {{ $today->format("d/m/Y") }}</li>
		@foreach($work_period_slots as $work_period_slot)
		<li class="odd">Start: {{ $work_period_slot->work_period->start_time }}</li>
		<li class="even">Stop: {{ $work_period_slot->work_period->end_time }}</li>
		@endforeach
		<li class="footer"><a href="{{ route('work-period-slots.date', ['date' => false]) }}">View Expanded Day</a></li>
	</ul>
</div>
@endif
<div id="selections">
	<ul>
		<li><a href="/member-work-slots-monthly">View Work Selected By Month</a></li>
	</ul>
</div>
@endsection