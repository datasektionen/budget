<template>
	<tbody>
	<tr class="space">
        <td v-if="suggestion"></td>
        <td></td>
        <td class="accounts"></td>
        <td class="accounts"></td>
        <td class="col-income"></td>
        <td class="col-expenses"></td>
        <td></td>
        <td></td>
    </tr>
    <tr class="header">
        <td v-if="suggestion"></td>
        <td class="name">
            <span v-bind:class="{loading:costCentre.loading}"></span>
            <input v-if="suggestion" type="text" placeholder="Namn på kostnadsställe" v-model="costCentre.name" v-on:change="updateCostCentre()">
            <span v-else class="input" v-html="costCentre.name"></span>
        </td>
        <td class="accounts speedledger-id" colspan="2">
            <input v-if="suggestion" type="text" class="speedledger-id" placeholder="Bokf.-id" v-model="costCentre.speedledger_id" v-on:change="updateCostCentre()">
            <span v-else class="input" v-html="costCentre.speedledger_id"></span>
		</td>
        <td class="col-income plus cash"><span v-html="fmt(income / 100)"></span> SEK</td>
        <td class="col-expenses minus cash"><span v-html="fmt(expenses / 100)"></span> SEK</td>
        <td v-bind:class="{ cash:true, minus: balance < 0, plus: balance > 0}"><span v-html="fmt(balance / 100)"></span> SEK</td>
        <td v-if="booked" v-bind:class="{ cash:true, plus: balance < costCentre.booked, minus: balance > costCentre.booked}"><span v-html="fmt(costCentre.booked / 100)"></span> SEK</td>
    </tr>
    <budget-line v-for="budget_line in costCentre.budget_lines" :booked="booked" :suggestion="suggestion" :budget-line="budget_line" :key="budget_line.id" v-on:committee="setCommittee"></budget-line>
    <tr class="vague" v-if="suggestion">
        <td v-if="suggestion"></td>
        <td class="description">
            <input class="name" type="text" v-model="costCentre.new_name" v-on:change="createBudgetLine()" placeholder="Skapa ny...">
        </td>
        <td class="accounts">
            <div class="select small">
                <select v-on:change="createBudgetLine()" v-model="costCentre.new_type">
                    <option value=""></option>
                    <option value="internal">I</option>
                    <option value="external">E</option>
                </select>
            </div>
        </td>
        <td class="accounts"></td>
        <td class="col-income cash plus">
            <span class="unit">SEK</span>
            <span><currency-input v-model="costCentre.new_income" v-on:change="createBudgetLine()" class="income" /></span>
        </td>
        <td class="col-expenses cash minus">
            <span class="unit">SEK</span>
            <span><currency-input v-model="costCentre.new_expenses" v-on:change="createBudgetLine()" class="expenses" /></span>
        </td>
        <td v-bind:class="{ cash: true }">
            <span v-html="fmt(costCentre.new_income - costCentre.new_expenses)"></span> SEK
        </td>
        <td v-if="booked">
            <span v-html="fmt(costCentre.booked)"></span> SEK
        </td>
    </tr>
</tbody>
</template>


<script>
export default {
    props: ['costCentre', 'suggestion', 'booked'],
    methods: {
        updateCostCentre: function () {
            this.costCentre.loading = true;
            fetch('/api/cost-centres/' + this.costCentre.id, {
                method: 'PUT',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'name': this.costCentre.name,
                    'speedledger_id': this.costCentre.speedledger_id
                })
            })
            .then(res => res.json())
            .then(json => {this.costCentre.loading = false})
        },
        createBudgetLine: function () {
            this.costCentre.loading = true;
            fetch('/api/cost-centres/' + this.costCentre.id + '/budget-lines', {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'suggestion_id': this.suggestion ? this.suggestion.id : -1,
                    'income': this.costCentre.new_income,
                    'expenses': this.costCentre.new_expenses,
                    'name': this.costCentre.new_name,
                    'type': this.costCentre.new_type
                })
            })
            .then(res => res.json())
            .then(json => {
                if (json !== false) {
                    this.costCentre.new_income = 0
                    this.costCentre.new_expenses = 0
                    this.costCentre.new_name = ''
                    this.costCentre.new_type = 'internal'
                	this.costCentre.loading = false;
                    this.costCentre.budget_lines.push(json)
          			//this.$emit('committee', json.committee)
                }
            })
        },
        setCommittee: function (c) {
            this.$emit('committee', c)
        }
    }, 
    computed: {
    	income: function () {
    		return this.costCentre.budget_lines.map(x => 
    			x.deleted ? 0 : x.income
    		).reduce((a, b) => parseInt(a) + parseInt(b), 0)
    	},
    	expenses: function () {
    		return this.costCentre.budget_lines.map(x => 
    			x.deleted ? 0 : x.expenses
    		).reduce((a, b) => parseInt(a) + parseInt(b), 0)
    	},
    	balance: function () {
    		return this.income - this.expenses
    	}
    }
}
</script>
