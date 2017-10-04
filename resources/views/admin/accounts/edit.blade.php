@extends('master')

@section('title', 'Ändra konto')

@section('content')
{!! AuroraForm::open() !!}
	{!! AuroraForm::text('number', 'Nummer', $account->number) !!}
	{!! AuroraForm::text('name', 'Namn', $account->name) !!}
	{!! AuroraForm::textarea('description', 'Beskrivning', $account->description) !!}
	{!! AuroraForm::submit('Ändra') !!}
{!! AuroraForm::close() !!}
@endsection