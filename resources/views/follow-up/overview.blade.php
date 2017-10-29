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
			<th class="cash col-income" style="padding-right: 15px;">Intäkter</th>
			<th class="cash col-expenses" style="padding-right: 15px;">Utgifter</th>
			<th class="cash">Balans</th>
			<th class="cash">Resultat</th>
			<th class="cash">Diff</th>
		</tr>
	</thead>
	<?php $incomes = 0; ?>
	<?php $expenses = 0; ?>
	<?php $balance = 0; ?>
	<?php $booked = 0; ?>
	@foreach ($followUp->committees as $committee)
	<tr>
		<td class="name">
			<span class="input"><a href="/follow-up/{{ $followUp->id }}/committees/{{ $committee->id }}">{{ $committee->name }}</a></span>
		</td>
		<td class="col-income plus cash">
			{{ Fmt::cash($committee->c_income, 2, 0) }} SEK
			<?php $incomes += $committee->c_income; ?>
		</td>
		<td class="col-expenses minus cash">
			{{ Fmt::cash($committee->c_expenses, 2, 0) }} SEK
			<?php $expenses += $committee->c_expenses; ?>
		</td>
		<td class="{{ ($i = $committee->c_income - $committee->c_expenses) < 0 ? "minus" : ($i > 0 ? "plus" : "") }} cash">
			{{ Fmt::cash($committee->c_income - $committee->c_expenses, 2, 0) }} SEK
			<?php $balance += $committee->c_income - $committee->c_expenses; ?>
		</td>
		<td class="cash">
			{{ Fmt::cash($committee->c_booked, 2, 0) }} SEK
			<?php $booked += $committee->c_booked; ?>
		</td>
		<td class="{{ $committee->c_booked < $committee->c_income - $committee->c_expenses ? "minus" : ($committee->c_booked > $committee->c_income - $committee->c_expenses ? "plus" : "") }} cash">
			{{ Fmt::cash($committee->c_booked - ($committee->c_income - $committee->c_expenses), 2, 0) }} SEK
		</td>
	</tr>
	@endforeach
	<tfoot>
		<tr>
			<th class="name" style="text-align: left">
				<span class="input">Totalt</span>
			</th>
			<th class="col-income plus cash">
				{{ Fmt::cash($incomes, 2, 0) }} SEK
			</th>
			<th class="col-expenses minus cash">
				{{ Fmt::cash($expenses, 2, 0) }} SEK
			</th>
			<th class="{{ $balance > 0 ? 'plus' : 'minus' }} cash">
				{{ Fmt::cash($balance, 2, 0) }} SEK
			</th>
			<th class="{{ $booked > 0 ? 'plus' : 'minus' }} cash">
				{{ Fmt::cash($booked, 2, 0) }} SEK
			</th>
			<th class="{{ $balance < $booked ? 'plus' : 'minus' }} cash">
				{{ Fmt::cash($booked - $balance, 2, 0) }} SEK
			</th>
		</tr>
	</tfoot>
</table>
</div>
@endsection
