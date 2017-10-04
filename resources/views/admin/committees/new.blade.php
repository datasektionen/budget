@extends('master')

@section('title', 'Ny nämnd/projekt')

@section('content')
{!! AuroraForm::open() !!}
	{!! AuroraForm::text('name', 'Namn') !!}
	{!! AuroraForm::select('type', 'Typ', ['committee' => 'Nämnd', 'project' => 'Projekt', 'other' => 'Annat']) !!}
	{!! AuroraForm::submit('Skapa') !!}
{!! AuroraForm::close() !!}
@endsection