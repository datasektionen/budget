<html>
<head>
	<title>Skriv ut budgetförslag</title>
	<link rel="stylesheet" href="//aurora.datasektionen.se" />
	<link rel="stylesheet" href="/css/print.css" />
</head>
<body>
	<?php 
	$total = 0;
	$totalBefore = 0;
	?>
	<div class="blue-grey content">
		<h2>Ändringar genom budgetförslag</h2>
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
				<td colspan="2"></td>
				<td class="{{ $budgetLine->parentLine !== null && $budgetLine->parentLine->name === $budgetLine->name ? 'nochange' : '' }}">
					{{ $budgetLine->name }}
					@if ($budgetLine->parentLine !== null && $budgetLine->parentLine->name != $budgetLine->name)
					<br>
					<span class="old">(fd {{ $budgetLine->parentLine->name }})</span>
					@endif
				</td>
				<td class="cash {{ $budgetLine->parentLine !== null && $budgetLine->parentLine->income === $budgetLine->income ? 'nochange' : '' }}">
					{{ Fmt::cash($budgetLine->income, 2, 0) }} kr 
					@if ($budgetLine->parentLine !== null)
					<span class="old">({{ Fmt::cash($budgetLine->parentLine->income, 2, 0) }} kr)</span>
					@endif
				</td>
				<td class="cash {{ $budgetLine->parentLine !== null && $budgetLine->parentLine->expenses === $budgetLine->expenses ? 'nochange' : '' }}">
					{{ Fmt::cash($budgetLine->expenses, 2, 0) }} kr 
					@if ($budgetLine->parentLine !== null)
					<span class="old">({{ Fmt::cash($budgetLine->parentLine->expenses, 2, 0) }} kr)</span>
					@endif
				</td>
				<td class="cash {{ $budgetLine->parentLine !== null && $budgetLine->parentLine->balance === $budgetLine->balance ? 'nochange' : '' }}">
					{{ Fmt::cash($budgetLine->balance, 2, 0) }} kr
					<?php $total += $budgetLine->balance; ?> 
					@if ($budgetLine->parentLine !== null)
					<span class="old">({{ Fmt::cash($budgetLine->parentLine->balance, 2, 0) }} kr)</span>
					<?php $totalBefore += $budgetLine->parentLine->balance; ?>
					@endif
				</td>
			</tr>
			@endforeach
			@endforeach
			@endforeach

			<tfoot>
				<tr>
					<th>Totalt dessa rader:</th>
					<th colspan="5" class="cash">{{ Fmt::cash($total, 2, 0) }} kr <span class="old">({{ Fmt::cash($totalBefore, 2, 0) }} kr)</span></th>
				</tr>
				<tr>
					<th>Differens:</th>
					<th colspan="5" class="cash">{{ (($total - $totalBefore) > 0 ? '+' : '') . Fmt::cash($total - $totalBefore, 2, 0) }} kr</th>
				</tr>
			</tfoot>
		</table>
	</div>
</body>
</html>