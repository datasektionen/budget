@extends('master')

@section('title', 'Rambudget')

@section('header-left')
	<a href="/">Start</a>
@endsection

@section('head-js')
	<script src="//unpkg.com/vue"></script>
@endsection

@section('content')
<div id="app">
  <div id="budget">
    <table class="budget">
      <thead>
	    <tr>
	      <th>Nämnd/Projekt</th>
	      <th class="cash col-income" style="padding-right: 15px;">Intäkter</th>
	      <th class="cash col-expenses" style="padding-right: 15px;">Utgifter</th>
	      <th class="cash accounts" style="padding-right: 15px;">Externt</th>
	      <th class="cash accounts" style="padding-right: 15px;">Internt</th>
	      <th class="cash">Balans</th>
	    </tr>
      </thead>
      <?php $last = ''; ?>


      @foreach ($committees as $committee)
        @if (!$committee->inactive)
	      @if ($committee->type != $last)
		    <tr class="section">
			  <td colspan="6">
			    @if ($committee->type === 'committee')
				  Nämnder
			    @elseif ($committee->type === 'project')
				  Projekt
			    @else
				  Övrigt
			    @endif
			  </td>
		    </tr>
		    <?php $last = $committee->type; ?>
	      @endif
	      <tr>
		    <td class="name">
			  <span class="input"><a href="/committees/{{ $committee->id }}">{{ $committee->name }}</a></span>
		    </td>
		    <td class="col-income plus cash">
			  {{ Fmt::cash($committee->income, 2, 0) }} SEK
		    </td>
		    <td class="col-expenses minus cash">
			  {{ Fmt::cash($committee->expenses, 2, 0) }} SEK
		    </td>
		    <td class="accounts {{ ($i = $committee->external) < 0 ? "minus" : ($i > 0 ? "plus" : "") }} cash">
			  {{ Fmt::cash($committee->external, 2, 0) }} SEK
		    </td>
		    <td class="accounts {{ ($i = $committee->internal) < 0 ? "minus" : ($i > 0 ? "plus" : "") }} cash">
			  {{ Fmt::cash($committee->internal, 2, 0) }} SEK
		    </td>
		    <td class="{{ ($i = $committee->balance) < 0 ? "minus" : ($i > 0 ? "plus" : "") }} cash">
			  {{ Fmt::cash($committee->balance, 2, 0) }} SEK
		    </td>
	      </tr>
        @endif
	  @endforeach
	  <tfoot>
		<tr>
		  <th class="name" style="text-align: left">
			<span class="input">Totalt</span>
		  </th>
		  <th class="col-income plus cash">
			{{ Fmt::cash($income, 2, 0) }} SEK
		  </th>
		  <th class="col-expenses minus cash">
			{{ Fmt::cash($expenses, 2, 0) }} SEK
		  </th>
		  <th class="accounts {{ $external > 0 ? 'plus' : 'minus' }} cash">
			{{ Fmt::cash($external, 2, 0) }} SEK
		  </th>
		  <th class="accounts {{ $internal > 0 ? 'plus' : 'minus' }} cash">
			{{ Fmt::cash($internal, 2, 0) }} SEK
		  </th>
		  <th class="{{ $balance > 0 ? 'plus' : 'minus' }} cash sum">
			{{ Fmt::cash($balance, 2, 0) }} SEK
		  </th>
		</tr>
	  </tfoot>
    </table>
    @if ($suggestion != null)
	<alert :suggestion="{{ $suggestion }}"></alert>
@endif
</div>
</div>
@endsection
