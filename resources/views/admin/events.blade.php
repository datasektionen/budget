@extends('admin.master')

@section('title', 'Händelser')

@section('admin-content')
<table>
	<thead>
		<tr>
			<th>Datum</th>
			<th>Händelse</th>
		</tr>
	</thead>

	@foreach ($future as $event)
	<tr>
		@if ($event['type'] === 'from')
		<td>{{ $event['valid_from'] }}</td>
		<td>{{ $event['name'] }} träder i kraft</td>
		@else
		<td>{{ $event['valid_to'] }}</td>
		<td>{{ $event['name'] }} slutar gälla</td>
		@endif
	</tr>
	@endforeach
</table>
@endsection