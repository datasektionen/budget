@extends('master')

@section('title', 'Dina budgetförslag')

@section('action-button')
	<a href="/suggestions/new" class="primary-action">Nytt förslag</a>
@endsection

@section('content')
<p>Här är de budgetförslag du är med i:</p>
<ul>
	@foreach ($suggestions as $suggestion)
		<li>
			<a href="/suggestions/{{ $suggestion->id }}">{{ $suggestion->name }}</a>
			@if ($suggestion->isImplemented())
				| Genomfört
			@else
				| 
				@if (session('suggestion') === $suggestion->id)
					<b>Ändrar just nu (<a href="/suggestions/{{ $suggestion->id }}/done">Klar</a>)</b>
				@else
					<a href="/suggestions/{{ $suggestion->id }}/edit">Ändra</a>
				@endif
				| <a href="/suggestions/{{ $suggestion->id }}/implement">Genomför</a>
			@endif
		</li>
	@endforeach
</ul>
@endsection