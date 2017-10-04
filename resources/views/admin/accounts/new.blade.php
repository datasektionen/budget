@extends('master')

@section('title', 'Ny nämnd/projekt')

@section('content')
{!! AuroraForm::open() !!}
	{!! AuroraForm::text('number', 'Nummer') !!}
	{!! AuroraForm::text('name', 'Namn') !!}
	{!! AuroraForm::textarea('description', 'Beskrivning') !!}
	{!! AuroraForm::submit('Ändra') !!}
{!! AuroraForm::close() !!}
@endsection