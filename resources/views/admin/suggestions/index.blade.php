@extends('admin.master')

@section('title', 'Budgetförslag')

@section('admin-content')
<table>
	<thead>
		<tr>
			<th>Namn</th>
			<th>Status</th>
			<th>Medlemmar</th>
		</tr>
	</thead>

	@foreach ($suggestions as $suggestion)
	<tr>
		<td><a href="/suggestions/{{ $suggestion->id }}">{{ $suggestion->name }}</a></td>
		<td>
			@if ($suggestion->isImplemented())
				Genomfört {{ $suggestion->implemented_at }}
			@elseif ($suggestion->isPublic())
				Inskickat {{ $suggestion->public_at }}
			@endif
		</td>
		<td>{{ Fmt::join($suggestion->authors()->take(7)->get()->pluck('name')) }}</td>
	</tr>
	@endforeach
</table>
@endsection