@extends('main')
@section('title', '| Calendar')

@section('content')
<table class="calendar" border="1">
	<tr>
		<th colspan="7">
			<a class="button magenta left" href="{{ route('pages.member-work-slots-monthly', ['month' => $monthYear->copy()->subMonths(1)->format('m'), 'year' => $monthYear->copy()->subMonths(1)->format('Y')]) }}">last month</a>
			{{ $monthYear->format('F') }} {{ $monthYear->format('Y') }}
			<a class="button magenta right" href="{{ route('pages.member-work-slots-monthly', ['month' => $monthYear->copy()->addMonths(1)->format('m'), 'year' => $monthYear->copy()->addMonths(1)->format('Y')]) }}">next month</a>
		</th>
	</tr>
	<tr>
		@foreach($days as $day)
		<th width="50">{{ $day }}</th>
		@endforeach
	</tr>
	@php ($date = $fromDate)
	@php ($dayCount = 0)
	@while($date <= $toDate)
		@if($dayCount === 0)
		<tr>
		@endif
		<td class="{{ ($date->eq($today))?'today':'' }} {{ isset( $workPeriodSlots[$date->format('Y-m-d')] )?'event':'non-event' }}">
			@if(isset( $workPeriodSlots[$date->format('Y-m-d')] ))
			<a href="{{ route('work-period-slots.date', ['date' => $date->format('Y-m-d')]) }}">
			@endif
			{{ $date->format('j') }}
			@if(isset( $workPeriodSlots[$date->format('Y-m-d')] ))
			</a>
			@endif
		</td>
		@php ($date->addDay(1))
		@php ($dayCount++)
		@if($dayCount === sizeof( $days ))
		@php ($dayCount = 0)
		</tr>
		@endif
	@endWhile
	</tr>
</table>
@endsection