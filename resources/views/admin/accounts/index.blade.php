@extends('admin.master')

@section('title', 'Kontoplan')

@section('action-button')
	<a href="/admin/accounts/new" class="primary-action">Skapa konto</a>
@endsection

@section('admin-content')
<table>
	<thead>
		<tr>
			<th>Nummer</th>
			<th>Namn</th>
			<th>Antal budgetposter</th>
		</tr>
	</thead>

	@foreach ($accounts as $account)
	<tr>
		<td><a href="/admin/accounts/{{ $account->id }}/edit">{{ $account->number }}</a></td>
		<td>{{ $account->name }}</td>
		<td>{{ $account->budgetLines()->count() }}</td>
	</tr>
	@endforeach
</table>
@endsection