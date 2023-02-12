@extends('admin.master')

@section('title', 'Nämnder och projekt')

@section('action-button')
	<a href="/admin/committees/new" class="primary-action">Skapa ny</a>
@endsection

@section('admin-content')
<table>
	<thead>
		<tr>
			<th>Namn</th>
		</tr>
	</thead>

	<tr class="section">
		<td colspan="1">Nämnder</td>
	</tr>
	@foreach ($committees as $committee)
      @if (!$committee->inactive)
	    <tr>
	      <td><a href="/admin/committees/{{ $committee->id }}/edit">
            {!! $committee->displayName() !!}
          </a></td>
	    </tr>
      @endif
	@endforeach

	<tr class="section">
		<td colspan="1">Projekt</td>
	</tr>
	@foreach ($projects as $project)
      @if (!$project->inactive)
	    <tr>
		  <td><a href="/admin/committees/{{ $project->id }}/edit">
            {!! $project->displayName() !!}
          </a></td>
	    </tr>
      @endif
	@endforeach

	<tr class="section">
		<td colspan="1">Annat</td>
	</tr>
	@foreach ($others as $other)
	<tr>
	  <td><a href="/admin/committees/{{ $other->id }}/edit">{{ $other->displayName() }}</a></td>
	</tr>
	@endforeach

    <tr class="section">
	  <td colspan="1">Inaktiva objekt</td>
	</tr>
    @foreach ($committees as $committee)
      @if ($committee->inactive)
        <tr>
	      <td><a href="/admin/committees/{{ $committee->id }}/edit">
            {!! $committee->displayName() !!}
          </a></td>
	    </tr>
      @endif
    @endforeach

    @foreach ($projects as $project)
      @if ($project->inactive)
	    <tr>
		  <td><a href="/admin/committees/{{ $project->id }}/edit">
            {!! $project->displayName() !!}
          </a></td>
	    </tr>
      @endif
    @endforeach
</table>
@endsection
