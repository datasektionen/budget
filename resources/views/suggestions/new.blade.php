@extends('master')

@section('title', 'Dina budgetförslag')

@section('content')
<p>Här skapar du ett nytt budgetförslag. Om du vill lägga till personer som kan ändra i förslaget gör du det senare.</p>
{!! AuroraForm::open() !!}
	{!! AuroraForm::text('name', ['label' => 'Namn', 'description' => 'Beskrivande namn på budgetförslaget']) !!}
	{!! AuroraForm::textarea('description', ['label' => 'Beskrivning', 'description' => 'Ej obligatoriskt']) !!}
	{!! AuroraForm::datetime('valid_to', ['label' => 'Giltig till', 'description' => 'Sista dag som budgetposterna i detta förslag är giltiga'], date('Y-12-31\T23:59', strtotime('+1 year'))) !!}
	{!! AuroraForm::submit('Skapa') !!}
{!! AuroraForm::close() !!}
@endsection