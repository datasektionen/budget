@extends('master')

@section('title', 'Budgetuppföljning')

@section('content')
<p>Ladda upp en exporterad PDF från Speedledger för att fortsätta.</p>
{!! AuroraForm::open(['files' => true]) !!}
	{!! AuroraForm::file('report', 'PDF från Speedledger') !!}
	{!! AuroraForm::submit('Starta') !!}
{!! AuroraForm::close() !!}
@endsection