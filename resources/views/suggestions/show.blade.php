@extends('master')

@section('title', 'Budgetförslag: ' . $suggestion->name)

@section('content')
<table>
	<tr>
		<th>
			Budgetförslag
		</th>
		<td>
			{{ $suggestion->name }}
		</td>
	</tr>
	<tr>
		<th>
			Berörda nämnder
		</th>
		<td>
			{{ Fmt::join($suggestion->committees()->pluck('name')) }}
		</td>
	</tr>
	<tr>
		<th>
			Redigeringsbehöriga
		</th>
		<td>
			{{ Fmt::join($suggestion->authors->map(function ($x) { return $x->first_name . ' ' . $x->last_name; })) }}. <a href="/suggestions/{{ $suggestion->id }}/share">Lägg till</a>.
		</td>
	</tr>
</table>
<?php $pre = $post = 0; ?>
<h2>Ändringar</h2>
<table class="budget">
	<thead>
		<tr>
			<th></th>
			<th colspan="4" style="text-align: center">Ersätter</th>
			<th colspan="4" style="text-align: center">Ny</th>
		</tr>
		<tr>
			<th>Sekundärt resultatställe</th>
			<th>Budgetpost</th>
			<th class="cash">In</th>
			<th class="cash">Ut</th>
			<th class="cash">Totalt</th>
			<th>Budgetpost</th>
			<th class="cash">In</th>
			<th class="cash">Ut</th>
			<th class="cash">Totalt</th>
		</tr>
	</thead>
	@foreach ($suggestion->committees() as $committee)
	<tr class="header">
		<td colspan="9"><span class="input">{{ $committee->name }}</span></td>
	</tr>
	@foreach ($suggestion->costCentresForCommittee($committee->id) as $costCentre)
	@foreach ($suggestion->budgetLinesForCostCentre($costCentre->id) as $budgetLine)
	@if ($budgetLine->suggestion_id === $suggestion->id)
	<tr>
		<td><span class="input">{{ $costCentre->name }}</span></td>
		@if ($budgetLine->parentLine === null)
		<td colspan="4"></td>
		@else
		<td>{{ $budgetLine->parentLine->name }}</td>
		<td class="cash">{{ Fmt::cash($budgetLine->parentLine->income, 2, 0) }}</td>
		<td class="cash">{{ Fmt::cash($budgetLine->parentLine->expenses, 2, 0) }}</td>
		<td class="cash">{{ Fmt::cash($budgetLine->parentLine->balance(), 2, 0) }}</td>
		<?php $post += $budgetLine->parentLine->balance(); ?>
		@endif
		<td><span class="input">{{ $budgetLine->name }}</span></td>
		<td class="cash">{{ Fmt::cash($budgetLine->income, 2, 0) }}</td>
		<td class="cash">{{ Fmt::cash($budgetLine->expenses, 2, 0) }}</td>
		<td class="cash">{{ Fmt::cash($budgetLine->balance(), 2, 0) }}</td>
		<?php $pre += $budgetLine->balance(); ?>
	</tr>
	@endif
	@endforeach
	@endforeach
	@endforeach
	<tfoot>
		<tr>
			<th><span class="input">Totalt:</span></th>
			<th></th>
			<th></th>
			<th></th>
			<th class="cash">{{ Fmt::cash($post, 2, 0) }}</th>
			<th></th>
			<th></th>
			<th></th>
			<th class="cash">{{ Fmt::cash($pre, 2, 0) }}</th>
		</tr>
	</tfoot>
</table>
@endsection
