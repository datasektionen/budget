@extends('master')

@section('title', 'Dela budgetförslag')

@section('content')
{!! AuroraForm::open() !!}
	{!! AuroraForm::text('kth_username', 'KTH-användarnamn (utan @kth.se)') !!}
	{!! AuroraForm::submit('Lägg till') !!}
{!! AuroraForm::close() !!}
@endsection