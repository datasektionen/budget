@extends('master')

@section('title', 'Budgetuppföljning')

@section('content')
<h1>Nyligen skapade uppföljningar</h1>
<ul>
	@foreach ($followUps as $followUp)
	<li><a href="/follow-up/{{ $followUp->id }}">Skapad {{ $followUp->created_at }}</a></li>
	@endforeach
</ul>
<p>Ladda upp en exporterad PDF från Speedledger för att fortsätta.</p>
{!! AuroraForm::open(['files' => true]) !!}
	{!! AuroraForm::file('report', 'PDF från Speedledger') !!}
	{!! AuroraForm::submit('Starta') !!}
{!! AuroraForm::close() !!}
@endsection