@extends('main')
@section('title', '| Select Work')

@section('stylesheets')
	{!! Html::style('js/css/ui.core.css') !!}
	{!! Html::style('js/css/ui.theme.css') !!}
	{!! Html::style('js/css/ui.datepicker.css') !!}
@endsection

@section('content')
<div id="first-column">
	{!! Form::open(['method' => 'GET']) !!}
		<ul>
			<li>
				{{ Form::label('work_type_id', 'Work Type:') }}
				{{ Form::select('work_type_id', $work_types, null, ['placeholder' => 'Select work type...'] ) }}
			</li>
			<li>
				{{ Form::label('date', 'Date:') }}
				{{ Form::text('date', null, ['autocomplete' => 'off']) }}
			</li>
			<li>
				{{ Form::button('Search', ['type' => 'submit']) }}
			</li>
		</ul>
	{!! Form::close() !!}
</div>
<div id="second-column">
</div>
<div id="full-width">
	{!! Form::open(['method' => 'POST']) !!}
		<table class="datagrid-table">
			<tr>
				<th>Select</th>
				<th>Work Type</th>
				<th>Entered by</th>
				<th>Modified by</th>
				<th>Date Entered</th>
				<th>Date Modified</th>
				<th>Date</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Comments</th>
			</tr>
			@foreach($work_periods as $work_period)
			<tr>
				<td>{{ Form::checkbox('select[]', $work_period->id) }}</td>
				<td>{{ $work_period->work_type->title }}</td>
				<td>{{ $work_period->user_entered->name }}</td>
				<td>{{ $work_period->user_modified->name }}</td>
				<td>{{ $work_period->entered_date }}</td>
				<td>{{ $work_period->modified_date }}</td>
				<td>{{ $work_period->date }}</td>
				<td>{{ $work_period->start_time }}</td>
				<td>{{ $work_period->end_time }}</td>
				<td>{{ $work_period->comments }}</td>
			</tr>
			@endforeach
			<tr>
				<td>{{ Form::checkbox('select-all', 'yes') }}</td>
				<td colspan=9>Select All</td>
			</tr>
		</table>

		{!! $work_periods->links() !!}

		{{ Form::button('Select', ['type' => 'submit']) }}
	{!! Form::close() !!}
</div>

@endsection

@section('scripts')
	{!! Html::script('js/jquery-1.6.1.js') !!}
	{!! Html::script('js/ui/ui.datepicker.js') !!}
	{!! Html::script('js/select-work.js') !!}
@endsection