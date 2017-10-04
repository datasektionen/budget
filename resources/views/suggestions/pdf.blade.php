<html>
<head>
	<title>Skriv ut budgetförslag</title>
	<link rel="stylesheet" href="//aurora.datasektionen.se" />
	<link rel="stylesheet" href="/css/print.css" />
</head>
<body>
	<div class="blue-grey">
		<h2>Ändringar i budgetförslag</h2>
		<table class="budget">
			<thead>
				<tr>
					<th>Nämnd/projekt</th>
					<th>Sekundärt resultatställe</th>
					<th>Budgetpost</th>
					<th class="cash">In <span class="old">(tidigare värde)</span></th>
					<th class="cash">Ut <span class="old">(tidigare värde)</span></th>
					<th class="cash">Totalt <span class="old">(tidigare värde)</span></th>
				</tr>
			</thead>
			@foreach ($suggestion->committees() as $committee)
			<tr class="committee">
				<td colspan="9"><span class="input">{{ $committee->name }}</span></td>
			</tr>
			@foreach ($suggestion->costCentresForCommittee($committee->id) as $costCentre)
			<tr class="cost-centre">
				<td></td>
				<td colspan="8"><span class="input">{{ $costCentre->name }}</span></td>
			</tr>
			@foreach ($suggestion->budgetLinesForCostCentre($costCentre->id) as $budgetLine)
			<tr>
				<td></td>
				<td></td>
				<td>{{ $budgetLine->name }}</td>
				<td>
					{{ Fmt::cash($budgetLine->income, 2, 0) }} kr 
					@if ($budgetLine->parentLine !== null)
					<span class="old">({{ Fmt::cash($budgetLine->parentLine->income, 2, 0) }} kr)</span>
					@endif
				</td>
				<td>
					{{ Fmt::cash($budgetLine->expenses, 2, 0) }} kr 
					@if ($budgetLine->parentLine !== null)
					<span class="old">({{ Fmt::cash($budgetLine->parentLine->expenses, 2, 0) }} kr)</span>
					@endif
				</td>
				<td>
					{{ Fmt::cash($budgetLine->balance(), 2, 0) }} kr 
					@if ($budgetLine->parentLine !== null)
					<span class="old">({{ Fmt::cash($budgetLine->parentLine->balance(), 2, 0) }} kr)</span>
					@endif
				</td>
			</tr>
			@endforeach
			@endforeach
			@endforeach
		</table>
	</div>
</body>
</html>