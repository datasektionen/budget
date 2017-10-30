@extends('admin.master')

@section('title', 'Budgetrader för konto ' . $account->number)

@section('admin-content')
<table>
	<thead>
		<tr>
			<th>Nämnd</th>
			<th>Sekundärt resultatställe</th>
			<th>Budgetpost</th>
			<th>Giltig från</th>
			<th>Giltig till</th>
		</tr>
	</thead>

	@foreach ($budgetLines as $budgetLine)
	<tr>
		<td><a href="/admin/committees/{{ $budgetLine->costCentre->committee->id }}">{{ $budgetLine->costCentre->committee->name }}</a></td>
		<td><a href="/admin/cost-centres/{{ $budgetLine->costCentre->id }}">{{ $budgetLine->costCentre->name }}</a></td>
		<td><a href="/admin/budget-lines/{{ $budgetLine->id }}">{{ $budgetLine->name }}</a></td>
		<td class="nowrap">{{ $budgetLine->valid_from }}</td>
		<td class="nowrap">{{ $budgetLine->valid_to }}</td>
	</tr>
	@endforeach
</table>
{!! $budgetLines->links() !!}
@endsection