@extends('master')

@section('title', 'Budgetuppföljning')

@section('header-left')
	<a href="/">Start</a>
@endsection

@section('head-js')
	<script src="//unpkg.com/vue"></script>
@endsection

@section('content')
@if (count($error) > 0)
<h2>Följande kunde inte matchas mot någon budgetpost:</h2>
<table>
	<thead>
		<tr>
			<th>Nämnd</th>
			<th>Kostnadsställe</th>
			<th>Speedledger-id</th>
			<th>Belopp</th>
		</tr>
	</thead>
@foreach ($error as $err)
	<tr>
		<td>{{ $err["budget_line"]["committee"] }}</td>
		<td>{{ $err["budget_line"]["cost_centre"] }}</td>
		<td>({{ $err["budget_line"]["speedledger_id"] }})</td>
		<td>
			<table>
			@foreach ($err["spec"] as $acc)
				<tr>
					<td>{{ $acc['account'] }}</td>
					<td>{{ $acc['name'] }}</td>
					<td>{{ Fmt::cash($acc['amount']) }}</td>
				</tr>
			@endforeach
			</table>
		</td>
	</tr>
@endforeach
</table>
<br/><br/>
@endif

<div id="budget">
<table class="budget" v-for="committee in committees">
	<thead>
		<tr>
			<th class="name">
				<input type="text" name="" v-bind:value="committee.name">
			</th>
			<th></th>
			{{--
			<th class="plus cash">
				<span v-html="[].concat.apply([], committee.cost_centres.map(x => x.budgetLines.map(x => x.income))).reduce((a, b) => parseInt(a) + parseInt(b), 0)"></span> 
				SEK
			</th>
			<th class="minus cash">
				<span v-html="[].concat.apply([], committee.cost_centres.map(x => x.budgetLines.map(x => x.expenses))).reduce((a, b) => parseInt(a) + parseInt(b), 0)"></span> 
				SEK
			</th>
			--}}
			<th class="minus cash">
				<span v-html="[].concat.apply([], committee.cost_centres.map(x => x.budgetLines.map(x => x.income))).reduce((a, b) => parseInt(a) + parseInt(b), 0) - [].concat.apply([], committee.cost_centres.map(x => x.budgetLines.map(x => x.expenses))).reduce((a, b) => parseInt(a) + parseInt(b), 0)"></span> 
				SEK
			</th>
			<th class="minus cash">
				<span v-html="Math.round([].concat.apply([], committee.cost_centres.map(x => x.budgetLines.map(x => x.booked))).reduce((a, b) => (parseFloat(a) || 0) + (parseFloat(b) || 0), 0), 2)"></span> 
				SEK
			</th>
		</tr>
	</thead>
	<tr class="space"><td></td><td></td><td></td><td></td></tr>
	<tbody v-for="cost_centre in committee.cost_centres">
		<tr class="header">
			<td class="name">
				<input type="text" v-bind:value="cost_centre.name">
			</td>
			<td></td>
			{{--
			<td class="plus cash">
				<span v-html="cost_centre.budgetLines.map(x => x.income).reduce((a, b) => parseInt(a) + parseInt(b), 0)"></span> 
				SEK
			</td>
			<td class="minus cash">
				<span v-html="cost_centre.budgetLines.map(x => x.expenses).reduce((a, b) => parseInt(a) + parseInt(b), 0)"></span> 
				SEK
			</td>
			--}}
			<td class="minus cash">
				<span v-html="cost_centre.budgetLines.map(x => x.income).reduce((a, b) => parseInt(a) + parseInt(b), 0) - cost_centre.budgetLines.map(x => x.expenses).reduce((a, b) => parseInt(a) + parseInt(b), 0)"></span> 
				SEK
			</td>
			<td v-bind:class="{ cash: true, plus: cost_centre.budgetLines.map(x => x.booked).reduce((a, b) => (parseFloat(a) || 0) + (parseFloat(b) || 0), 0) > cost_centre.budgetLines.map(x => x.income).reduce((a, b) => parseInt(a) + parseInt(b), 0) - cost_centre.budgetLines.map(x => x.expenses).reduce((a, b) => parseInt(a) + parseInt(b), 0), minus: cost_centre.budgetLines.map(x => x.booked).reduce((a, b) => (parseFloat(a) || 0) + (parseFloat(b) || 0), 0) < cost_centre.budgetLines.map(x => x.income).reduce((a, b) => parseInt(a) + parseInt(b), 0) - cost_centre.budgetLines.map(x => x.expenses).reduce((a, b) => parseInt(a) + parseInt(b), 0) }">
				<span v-html="Math.round(cost_centre.budgetLines.map(x => x.booked).reduce((a, b) => (parseFloat(a) || 0) + (parseFloat(b) || 0), 0), 2)"></span> 
				SEK
			</td>
		</tr>
		<tr v-for="budget_line in cost_centre.budgetLines">
			<td class="description">
				<input class="name" type="text" v-bind:value="budget_line.name">
			</td>
			<td v-html="budget_line.accounts.map((x) => x.number).join(', ')"></td>
			{{--
			<td class="cash plus">
				<input class="income" type="text" v-model="budget_line.income" v-on:change="updateBudgetLine(budget_line)" />
				<span class="unit">SEK</span>
			</td>
			<td class="cash minus">
				<input class="income" type="text" v-model="budget_line.expenses" v-on:change="updateBudgetLine(budget_line)" />
				<span class="unit">SEK</span>
			</td>
			--}}
			<td v-bind:class="{ cash: true }">
				<span v-html="budget_line.income - budget_line.expenses"></span> SEK
			</td>
			<td v-bind:class="{ cash: true, plus: budget_line.income-budget_line.expenses < (parseInt(budget_line.booked) || 0), minus: budget_line.income-budget_line.expenses > (parseInt(budget_line.booked) || 0) }">
				<span v-html="parseFloat(budget_line.booked) || 0"></span> SEK
			</td>
		</tr>
		<tr class="space"><td></td><td></td><td></td><td></td></tr>
	</tbody>
</table>
</div>
<script>
var search = '/api/search'
var app = new Vue({
    el: '#budget',
    data: {
        committees: {!! json_encode($committees) !!}
    },
    created: function() {
        
    },
    methods: {
    	updateBudgetLine: function (budget_line) {
    		
    	}
    }
})
</script>
@endsection
