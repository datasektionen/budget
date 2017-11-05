@extends('master')

@section('title', 'Importera CSV')

@section('content')
<p>Här kan du importera en budget på CSV-format till ditt förslag. Välj filen, typ av import och i vilken ordning kolumnerna finns i.</p>
{!! AuroraForm::open(['files' => true]) !!}
	{!! AuroraForm::file('csv', 'CSV med budget') !!}
	{!! AuroraForm::radioList('type', 'Typ av import', ['replace_all' => 'Ersätt hela sektionens budget', 'replace_committees' => 'Ersätt endast berörda nämnders budgetar', 'nice' => 'Ersätt endast budgetposter med identiskt namn', 'add' => 'Lägg endast till, trots att det finns poster med samma namn']) !!}
	{!! AuroraForm::number('start-at', 'Rad att starta inläsningen på', 17, ['step' => 1, 'min' => 1]) !!}
	{!! AuroraForm::select('committee-col', 'Kolumn för nämndnamn', array_combine(range(1, 10), range(1, 10)), 1) !!}
	{!! AuroraForm::select('cost-centre-col', 'Kolumn för kostnadsställe', array_combine(range(1, 10), range(1, 10)), 2) !!}
	{!! AuroraForm::select('budget-line-col', 'Kolumn för budgetrad', array_combine(range(1, 10), range(1, 10)), 3) !!}
	{!! AuroraForm::select('budget-line-income-col', 'Kolumn för budgetrads intäkt', array_combine(range(1, 10), range(1, 10)), 5) !!}
	{!! AuroraForm::select('budget-line-expenses-col', 'Kolumn för budgetrads utgift', array_combine(range(1, 10), range(1, 10)), 6) !!}
	{!! AuroraForm::select('accounts-col', 'Kolumn för kontonummer', [0 => 'Finns ej'] + array_combine(range(1, 10), range(1, 10)), 4) !!}
	{!! AuroraForm::select('speedledger-id-col', 'Kolumn för bokförings-id', [0 => 'Finns ej'] + array_combine(range(1, 10), range(1, 10)), 0) !!}
	{!! AuroraForm::select('type-col', 'Kolumn för type (externt/internt)', [0 => 'Finns ej'] + array_combine(range(1, 10), range(1, 10)), 0) !!}
	{!! AuroraForm::submit('Starta') !!}
{!! AuroraForm::close() !!}
@endsection