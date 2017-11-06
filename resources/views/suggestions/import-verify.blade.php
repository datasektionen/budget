@extends('master')

@section('title', 'Granska import')

@section('head-js')
@endsection

@section('content')
{!! AuroraForm::open(['url' => '/suggestions/' . $suggestion->id . '/import/complete']) !!}
<p>Det här är det som lästes in från din importerade CSV-fil. Gå igenom och kontrollera att det stämmer. När du är klar trycker på på Importera-knappen längst ner på denna sida för att lägga in det i ditt förslag.</p>

@if ($type == 'replace_all')
	<p>Om du godkänner detta kommer ditt förslag bestå av endast den budget som finns listad nedan.</p>
@elseif ($type == 'replace_committees')
	<p>Om du godkänner detta kommer ditt förslag bestå av helt nya budgetar (enligt nedan) för nämnderna/projekten {{ Fmt::join(array_map(function ($x) { return $x['name']; }, $committees)) }}. Alla andra nämnders budgetar kommer lämnas opåverkade.</p>
@elseif ($type == 'nice')
	<p>Om du godkänner detta kommer ditt förslag bestå av att alla budgetposter med namn som stämmer överens med nedan budgetrader kommer uppdateras till de nya värdena. De budgetrader som inte tidigare fanns (med exakt stavning), kommer skapas nya. Inga budgetrader kommer tas bort (om någon budgetrad inte har en motsvarighet i din nya budget finns den kvar).</p>
@elseif ($type == 'add')
	<p>Om du godkänner detta kommer ditt förslag bestå av att lägga till samtliga budgetposter nedan, trots att det redan finns poster med samma namn (det kommer då skapas dubletter).</p>
@endif

<ul>
	@foreach ($nonMatchedCommittees as $c)
		<li>Nämnden {{ $c['name'] }} hittades inte och kommer skapas</li>
	@endforeach
	@foreach ($nonMatchedCostCentres as $cc)
		<li>Kostnadsstället {{ $cc['name'] }} i {{ $cc['committee'] }} hittades inte och kommer skapas</li>
	@endforeach
</ul>

<div id="budget">
	<table class="budget">
		@foreach ($committees as $committee)
			<thead>
				<tr>
					<th class="name"><span class="input">{{ $committee['name'] }}</span></th>
	                <th class="accounts"></th>
	                <th class="accounts"></th>
	                <th class="col-income plus cash">{{ Fmt::cash($committee['income'], 0, 0) }} SEK</th>
	                <th class="col-expenses minus cash">{{ Fmt::cash($committee['expenses'], 0, 0) }} SEK</th>
	                <th class="minus cash">{{ Fmt::cash($committee['income']-$committee['expenses'], 0, 0) }} SEK</th>
				</tr>
			</thead>
			<tr class="space">
                <td></td>
                <td class="accounts"></td>
                <td class="accounts"></td>
                <td class="col-income"></td>
                <td class="col-expenses"></td>
                <td></td>
			</tr>
			@foreach ($committee['costCentres'] as $costCentre)
				<tr class="header">
			        <td class="name">
			            <span class="input">{{ $costCentre['name'] }}</span>
			        </td>
			        <td class="accounts speedledger-id" colspan="2">
			            <span class="input">{{ $costCentre['speedledger_id'] or '' }}</span>
					</td>
			        <td class="col-income plus cash">{{ Fmt::cash($costCentre['income'], 0, 0) }} SEK</td>
			        <td class="col-expenses minus cash">{{ Fmt::cash($costCentre['expenses'], 0, 0) }} SEK</td>
			        <td class="cash{{ $costCentre['income'] > $costCentre['expenses'] ? ' plus' : ($costCentre['income'] < $costCentre['expenses'] ? ' minus' : '') }}">{{ Fmt::cash($costCentre['income'] - $costCentre['expenses'], 0, 0) }} SEK</td>
			    </tr>
				@foreach ($costCentre['budgetLines'] as $budgetLine)
					<tr>
				        <td class="description">
				            <span class="input">{{ $budgetLine['name'] }}</span>
				        </td>
				        <td class="accounts">
				            {{ isset($budgetLine['type']) && $budgetLine['type'] == 'internal' ? 'I' : 'E' }}
				        </td>
				        <td class="accounts">{{ implode(', ', $budgetLine['accounts']) }}</td>
				        <td class="col-income cash plus">
				            <span class="unit">SEK</span>
				            <span class="input income">{{ Fmt::cash($budgetLine['income'], 0, 0) }}</span>
				        </td>
				        <td class="col-expenses cash minus">
				            <span class="unit">SEK</span>
				            <span class="input expenses">{{ Fmt::cash($budgetLine['expenses'], 0, 0) }}</span>
				        </td>
				        <td class="cash{{ $budgetLine['income'] > $budgetLine['expenses'] ? ' plus' : ($budgetLine['income'] < $budgetLine['expenses'] ? ' minus' : '') }}">
				            {{ Fmt::cash($budgetLine['income'] - $budgetLine['expenses'], 0, 0) }} SEK
				        </td>
				    </tr>
				@endforeach
				<tr class="space">
	                <td></td>
	                <td class="accounts"></td>
	                <td class="accounts"></td>
	                <td class="col-income"></td>
	                <td class="col-expenses"></td>
	                <td></td>
				</tr>
			@endforeach
			<tr class="space">
                <td></td>
                <td class="accounts"></td>
                <td class="accounts"></td>
                <td class="col-income"></td>
                <td class="col-expenses"></td>
                <td></td>
			</tr>
		@endforeach
	</table>
</div>

{!! Form::submit('Godkänn') !!}
{!! AuroraForm::close() !!}

@endsection
