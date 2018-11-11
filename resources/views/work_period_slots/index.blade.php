@extends('main')
@section('title', '| Work Period')

@section('content')
<div id="first-column">
	{!! Form::open(['method' => 'GET']) !!}
		{{ Form::button('Search', ['type' => 'submit']) }}
	{!! Form::close() !!}
</div>
<div id="second-column">
</div>
<div id="full-width">
	<table class="datagrid-table">
		<tr>
			<th>Work Type</th><th>Date</th><th>Start Time</th><th>End Time</th>
		</tr>
		@foreach($work_period_slots as $work_period_slot)
		<tr>
			<td>{{ $work_period_slot->work_period->work_type->title }}</td>
			<td>{{ $work_period_slot->work_period->date }}</td>
			<td>{{ $work_period_slot->work_period->start_time }}</td>
			<td>{{ $work_period_slot->work_period->end_time }}</td>
		</tr>
		@endforeach
	</table>

	{!! $work_period_slots->links() !!}
</div>

@endsection