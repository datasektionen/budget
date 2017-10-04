@extends('master')

@section('title', 'Ändra nämnd/projekt')

@section('content')
{!! AuroraForm::open() !!}
	{!! AuroraForm::text('name', 'Namn', $committee->name) !!}
	{!! AuroraForm::select('type', 'Typ', ['committee' => 'Nämnd', 'project' => 'Projekt', 'other' => 'Annat'], $committee->type) !!}
	{!! AuroraForm::submit('Skapa') !!}
{!! AuroraForm::close() !!}
@endsection