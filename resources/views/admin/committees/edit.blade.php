@extends('master')

@section('title', 'Ändra nämnd/projekt')

@section('content')
  {!! AuroraForm::open() !!}
  {!! AuroraForm::text('name', 'Namn', $committee->name) !!}
  {!! AuroraForm::select('type', 'Typ', ['committee' => 'Nämnd', 'project' => 'Projekt', 'other' => 'Annat'], $committee->type) !!}
  {!! AuroraForm::singleCheckbox('inactive', 'on', 'Markera inaktiv', [], $committee->inactive) !!}
  {!! AuroraForm::submit('Ändra') !!}
  {!! AuroraForm::close() !!}
@endsection
