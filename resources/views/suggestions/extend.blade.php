@extends('master')

@section('title', 'Dina budgetförslag')

@section('content')
<p>Kryssa för samtliga nämnder vars budgetar du vill förlänga så att det täcker tiden som ditt budgetförslag rör.</p>
{!! AuroraForm::open() !!}
	{!! AuroraForm::checkboxList('committees', 'Nämnder', $committees->pluck('name', 'id')) !!}
	{!! AuroraForm::submit('Lägg till') !!}
{!! AuroraForm::close() !!}
@endsection