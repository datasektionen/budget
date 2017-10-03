@extends('master')

@section('title', 'Datasektionens budgetsystem')

@section('content')
<p>Här finns centralts och alla nämnders olika budgetar. Välj en nämnd för att titta närmare:</p>
<ul>
	@foreach ($committees as $committee)
		<li><a href="/committees/{{ $committee->id }}">{{ $committee->name }}</a></li>
	@endforeach
</ul>
@endsection