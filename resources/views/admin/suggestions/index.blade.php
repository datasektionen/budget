@extends('admin.master')

@section('title', 'Budgetförslag')

@section('admin-content')
<table>
	<thead>
		<tr>
			<th>Namn</th>
		</tr>
	</thead>

	@foreach ($suggestions as $suggestion)
	<tr>
		<td><a href="/admin/committees/{{ $suggestion->id }}/edit">{{ $suggestion->name }}</a></td>
	</tr>
	@endforeach
</table>
@endsection