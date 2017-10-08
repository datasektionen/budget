@extends('master')

@section('title', 'Datasektionens budgetsystem')

@section('content')
<p>Budgeten styr sektionens arbete. Varje nämnd och projekt har en egen budget. Centralt är det primära resultatställe där allmänna utgifter hamnar. Därtill kan pengar användas efter till exempel SM-beslut. Välj en nämnd, projekt eller övrigt resultatställe nedan för att se dess detaljbudget. Du kan också välja att <a href="/overview">visa rambudgeten för alltsammans</a>.</p>
<div class="col">
	<h3>Nämnderna</h3>
	<ul>
		@foreach ($committees as $committee)
		<li><a href="/committees/{{ $committee->id }}">{{ $committee->name }}</a></li>
		@endforeach
	</ul>
</div>
<div class="col">
	<h3>Projekten</h3>
	<ul>
		@foreach ($projects as $project)
		<li><a href="/committees/{{ $project->id }}">{{ $project->name }}</a></li>
		@endforeach
	</ul>
</div>
<div class="col">
	<h3>Övrigt</h3>
	<ul>
		@foreach ($others as $other)
		<li><a href="/committees/{{ $other->id }}">{{ $other->name }}</a></li>
		@endforeach
	</ul>
</div>
<div class="clear"></div>
@endsection