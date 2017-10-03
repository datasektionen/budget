@extends('master')

@section('title', 'Dina budgetförslag')

@section('content')
{!! AuroraForm::open() !!}
	{!! AuroraForm::text('name', 'Namn') !!}
	{!! AuroraForm::textarea('description', 'Beskrivning') !!}
	{!! AuroraForm::datetime('valid_from', 'Giltig från') !!}
	{!! AuroraForm::datetime('valid_to', 'Giltig till') !!}
	{!! AuroraForm::submit('Skapa') !!}
{!! AuroraForm::close() !!}
@endsection