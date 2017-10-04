@extends('master')

@section('title', 'Dina budgetförslag')

@section('action-button')
	<a href="/suggestions/new" class="primary-action">Nytt förslag</a>
@endsection

@section('content')
@if ($suggestions->count() > 0)
<h1>Dina förslag</h1>
<p>Här är de budgetförslag du är med i:</p>
<table>
	<thead>
		<th style="width:85px"></th>
		<th>Benämning</th>
		<th>Status</th>
		<th colspan="1">Hantera</th>
	</thead>
	@foreach ($suggestions as $suggestion)
		<tr>
			<td style="text-align:center;padding: 5px 0">
				@if (session('suggestion') === $suggestion->id)
					<b>Ändrar just nu (<a href="/suggestions/{{ $suggestion->id }}/done">Färdig</a>)</b>
				@else
					<a href="/suggestions/{{ $suggestion->id }}/edit" class="btn theme-color" style="color:#fff;">Ändra</a>
				@endif
			</td>
			<td><a href="/suggestions/{{ $suggestion->id }}">{{ $suggestion->name }}</a></td>
			<td>
			@if ($suggestion->isImplemented())
				Genomfört
			@else
				Inte genomfört
			@endif
			
			
			</td>
			<td>
				@if (Auth::user()->isAdmin())
					<a href="/suggestions/{{ $suggestion->id }}/implement">Genomför</a>
				@endif
			</td>
		</tr>
	@endforeach
</table>
@endif

<h1>Så här funkar det</h1>
<p>För att ändra i budgeten måste man först skapa ett budgetförslag vilket man gör genom att trycka på knappen uppe till höger. Där får du ge ditt förslag ett namn, så att du kan referera till det vid kontakter med till exempel styrelsen. Alla inloggade användare kan skapa budgetförslag.</p>

<p>När själva förslaget är skapat kan du välja att ändra det. Tryck på den knapp ovan som är kopplad till förslaget. Du kan nu gå till budgeten och ändra. <b>Det är då de faktiska ändringarna i förslaget sker</b>. Ett meddelande längst ner på skärmen uppmärksammar dig på att du redigerar en budget. Du väljer nu vilka budgetposter som ska ändras, läggas till och tas bort (som i dagsläget görs genom att sätta intäkter och utgifter till noll).</p>

<p>När du känner dig färdig med budgetförslaget går du tillbaka till den här sidan, klickar på budgetförslaget och granskar dina ändringar.</p>

<h2>Men, budgeten ändras ju inte för alla!</h2>
<p>Nä, det är ju klart. Det var bara ett budgetförslag. För att det ska ändras måste Kassören eller annan administratör godkänna budgetförslaget, och <b>Genomföra</b> det. Det lär hen dock bara göra efter ett beslut från antingen SM eller Drektoratet. Därför finns den fina funktionen att skriva ut ditt förslag som PDF. Ta kontakt med kassören för mer information om hur du får igenom ditt budgetförslag.</p>
@endsection