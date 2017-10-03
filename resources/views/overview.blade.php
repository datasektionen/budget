@extends('master')

@section('title', 'Rambudget')

@section('header-left')
	<a href="/">Start</a>
@endsection

@section('head-js')
	<script src="//unpkg.com/vue"></script>
@endsection

@section('content')
<div id="budget">
<table class="budget">
	<thead>
		<tr>
			<th>Nämnd/Projekt</th>
			<th class="cash">Intäkter</th>
			<th class="cash">Utgifter</th>
			<th class="cash">Externt</th>
			<th class="cash">Internt</th>
			<th class="cash">Balans</th>
		</tr>
	</thead>
	@foreach ($committees as $committee)
	<tr>
		<td class="name">
			<span class="input"><a href="/committees/{{ $committee->id }}">{{ $committee->name }}</a></span>
		</td>
		<td class="col-income plus cash">
			{{ Fmt::cash($committee->income(), 2, 0) }} SEK
		</td>
		<td class="col-expenses minus cash">
			{{ Fmt::cash($committee->expenses(), 2, 0) }} SEK
		</td>
		<td class="col-expenses {{ ($i = $committee->external()) < 0 ? "minus" : ($i > 0 ? "plus" : "") }} cash">
			{{ Fmt::cash($committee->external(), 2, 0) }} SEK
		</td>
		<td class="col-expenses {{ ($i = $committee->internal()) < 0 ? "minus" : ($i > 0 ? "plus" : "") }} cash">
			{{ Fmt::cash($committee->internal(), 2, 0) }} SEK
		</td>
		<td class="{{ ($i = $committee->balance()) < 0 ? "minus" : ($i > 0 ? "plus" : "") }} cash">
			{{ Fmt::cash($committee->balance(), 2, 0) }} SEK
		</td>
	</tr>
	@endforeach
	<tfoot>
		<tr>
			<th class="name">
				<span class="input">Totalt</span>
			</th>
			<th class="col-income plus cash">
				{{ Fmt::cash(App\Models\Committee::incomeAll(), 2, 0) }} SEK
			</th>
			<th class="col-expenses minus cash">
				{{ Fmt::cash(App\Models\Committee::expensesAll(), 2, 0) }} SEK
			</th>
			<th class="col-income plus cash">
				{{ Fmt::cash(App\Models\Committee::externalAll(), 2, 0) }} SEK
			</th>
			<th class="col-expenses minus cash">
				{{ Fmt::cash(App\Models\Committee::internalAll(), 2, 0) }} SEK
			</th>
			<th class="minus cash">
				{{ Fmt::cash(App\Models\Committee::balanceAll(), 2, 0) }} SEK
			</th>
		</tr>
	</tfoot>
</table>
</div>
@endsection
