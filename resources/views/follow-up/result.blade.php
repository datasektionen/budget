@extends('master')

@section('title', 'Budgetuppföljning')

@section('header-left')
	<a href="/">Start</a>
@endsection

@section('content')
@if (isset($error) && count($error) > 0)
<h2>Följande kunde inte matchas mot någon budgetpost:</h2>
<table>
	<thead>
		<tr>
			<th>Nämnd</th>
			<th>Kostnadsställe</th>
			<th>Speedledger-id</th>
			<th>Belopp</th>
		</tr>
	</thead>
@foreach ($error as $err)
	<tr>
		<td>{{ $err["budget_line"]["committee"] }}</td>
		<td>{{ $err["budget_line"]["cost_centre"] }}</td>
		<td>({{ $err["budget_line"]["speedledger_id"] }})</td>
		<td>
			<table>
			@foreach ($err["spec"] as $acc)
				<tr>
					<td>{{ $acc['account'] }}</td>
					<td>{{ $acc['name'] }}</td>
					<td>{{ Fmt::cash($acc['amount']) }}</td>
				</tr>
			@endforeach
			</table>
		</td>
	</tr>
@endforeach
</table>
<br/><br/>
@endif

<div id="app">
	<committee :booked="true" :committee="{{ $followUp->committee }}" :followUp="{{ $followUp }}" user="{{ Auth::user() === null ? 'null' : Auth::user() }}"></committee>
</div>
@endsection
