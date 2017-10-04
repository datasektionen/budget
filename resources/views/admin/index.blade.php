@extends('admin.master')

@section('title', 'Administration')

@section('action-button')
	
@endsection

@section('admin-content')
<h1>Behörigheter i Budgetsystemet</h1>
<p>
	Grattis! Eftersom du kan se den här sidan är du begåvad med <a href="https://pls.datasektionen.se">Pls</a>-access till gruppen <i>budget.admin</i>. Om du vill att någon annan ska kunna se det här är det alltså där (i <a href="https://pls.datasektionen.se">Pls</a>) du lägger till folk. Det är typiskt bra om <a href="https://dfunkt.datasektionen.se/position/id/9">Kassören</a> har tillgång till att lägga till och ta bort folk där.
</p>
<h2>Vem kan göra vad?</h2>
<p>
	Alla kan se alla budgetar, även utan att ha loggat in. Det gäller när det är inställt så under <i>Synlighet</i> i menyn här till vänster. Det bör alltid gå att visa budgeten, förutom i Mottagningstider då det är lämpligt att stänga av synligheten för att inte spoila roliga saker för nØllan. Budgeten är ändå ett väldigt avslöjande dokument som specificerar en del event väldigt väl.
</p>
<p>
	Alla som har ett KTH-konto kan logga in och skapa egna budgetförslag. Dessa ändrar inte budgeten. Någon med administratörsbehörighet (typ du) kan gå in och genomföra ett förslag som någon annan skapat. Det implementeras då i budgeten. Innan man gör det kan det vara bra att det är godkänt på SM eller av Drektoratet (beroende på vad det är för ändring).
</p>
@endsection