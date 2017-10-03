<template>
<div id="budget">
    <table class="budget" v-if="committee">
        <thead>
            <tr>
                <th class="name">
                    <span class="input" v-html="committee.name"></span>
                </th>
                <th class="accounts"></th>
                <th class="accounts"></th>
                <th class="col-income plus cash">
                    <span v-html="fmt([].concat.apply([], committee.cost_centres.map(x => x.budget_lines.map(y => y.deleted ? 0 : (y.income * x.repetitions)))).reduce((a, b) => parseInt(a) + parseInt(b), 0))"></span> 
                    SEK
                </th>
                <th class="col-expenses minus cash">
                    <span v-html="fmt([].concat.apply([], committee.cost_centres.map(x => x.budget_lines.map(y => (y.deleted ? 0 : (y.expenses * x.repetitions))))).reduce((a, b) => parseInt(a) + parseInt(b), 0))"></span> 
                    SEK
                </th>
                <th class="minus cash">
                    <span v-html="fmt([].concat.apply([], committee.cost_centres.map(x => x.budget_lines.map(y => y.deleted ? 0 : (y.income * x.repetitions)))).reduce((a, b) => parseInt(a) + parseInt(b), 0) - [].concat.apply([], committee.cost_centres.map(x => x.budget_lines.map(y => y.deleted ? 0 : (y.expenses * x.repetitions)))).reduce((a, b) => parseInt(a) + parseInt(b), 0))"></span> 
                    SEK
                </th>
            </tr>
        </thead>
        <tbody v-for="cost_centre in committee.cost_centres">
            <tr class="space">
                <td></td>
                <td class="accounts"></td>
                <td class="accounts"></td>
                <td class="col-income"></td>
                <td class="col-expenses"></td>
                <td></td>
            </tr>
            <tr class="header">
                <td class="name">
                    <span v-bind:class="{loading:cost_centre.loading}"></span>
                    <input type="text" placeholder="Namn på kostnadsställe" v-model="cost_centre.name" v-on:change="updateCostCentre(cost_centre)">
                </td>
                <td class="accounts" colspan="2">
                    <input type="text" class="speedledger-id" placeholder="Bokf.-id" v-model="cost_centre.speedledger_id" v-on:change="updateCostCentre(cost_centre)">
                </td>
                <td class="col-income plus cash">
                    <span v-html="fmt(cost_centre.repetitions * cost_centre.budget_lines.map(x => x.deleted ? 0 : x.income).reduce((a, b) => parseInt(a) + parseInt(b), 0))"></span> 
                    SEK
                </td>
                <td class="col-expenses minus cash">
                    <span v-html="fmt(cost_centre.repetitions * cost_centre.budget_lines.map(x => x.deleted ? 0 : x.expenses).reduce((a, b) => parseInt(a) + parseInt(b), 0))"></span> 
                    SEK
                </td>
                <td v-bind:class="{ cash:true, minus: cost_centre.repetitions * (cost_centre.budget_lines.map(x => x.deleted ? 0 : x.income).reduce((a, b) => parseInt(a) + parseInt(b), 0) - cost_centre.budget_lines.map(x => x.deleted ? 0 : x.expenses).reduce((a, b) => parseInt(a) + parseInt(b), 0)) < 0, plus: cost_centre.repetitions * (cost_centre.budget_lines.map(x => x.deleted ? 0 : x.income).reduce((a, b) => parseInt(a) + parseInt(b), 0) - cost_centre.budget_lines.map(x => x.deleted ? 0 : x.expenses).reduce((a, b) => parseInt(a) + parseInt(b), 0)) > 0}">
                    <span v-html="fmt(cost_centre.repetitions * (cost_centre.budget_lines.map(x => x.deleted ? 0 : x.income).reduce((a, b) => parseInt(a) + parseInt(b), 0) - cost_centre.budget_lines.map(x => x.deleted ? 0 : x.expenses).reduce((a, b) => parseInt(a) + parseInt(b), 0)))"></span> 
                    SEK
                </td>
            </tr>
            <tr v-for="budget_line in cost_centre.budget_lines" v-bind:class="{ suggestion: suggestion && budget_line.suggestion_id === suggestion.id, deleted: budget_line.deleted }">
                <td class="description">
                    <span v-bind:class="{loading:budget_line.loading}"></span>
                    <input v-if="suggestion" class="name" type="text" v-model="budget_line.name" v-on:change="updateBudgetLine(budget_line)">
                    <span v-else class="input" v-html="budget_line.name"></span>
                </td>
                <td class="accounts">
                    <div v-if="suggestion" class="select small">
                        <select v-model="budget_line['type']" v-on:change="updateBudgetLine(budget_line)">
                            <option value="internal">I</option>
                            <option value="external">E</option>
                        </select>
                    </div>
                    <span v-else v-html="budget_line['type'] == 'internal' ? 'I' : 'E'"></span>
                </td>
                <td class="accounts" v-html="budget_line.accounts.map((x) => x.number).join(', ')"></td>
                <td class="col-income cash plus">
                    <span class="unit">SEK</span>
                    <span v-if="suggestion">
                        <currency-input v-model="budget_line.income" v-on:change="updateBudgetLine(budget_line)" class="income" />
                    </span>
                    <span v-if="suggestion === null" class="input income" v-html="fmt(budget_line.income)"></span>
                </td>
                <td class="col-expenses cash minus">
                    <span class="unit">SEK</span>
                    <span v-if="suggestion">
                        <currency-input v-model="budget_line.expenses" v-on:change="updateBudgetLine(budget_line)" class="expenses" />
                    </span>
                    <span v-if="suggestion === null" class="input expenses" v-html="fmt(budget_line.expenses)"></span>
                </td>
                <td v-bind:class="{ cash: true, plus: budget_line.income > budget_line.expenses, minus: budget_line.income < budget_line.expenses }">
                    <span v-html="fmt(budget_line.income - budget_line.expenses)"></span> SEK
                </td>
            </tr>
            <tr class="vague" v-if="suggestion">
                <td class="description">
                    <input class="name" type="text" v-model="cost_centre.new_name" v-on:change="createBudgetLine(cost_centre)" placeholder="Skapa ny...">
                </td>
                <td class="accounts">
                    <div class="select small">
                        <select v-on:change="createBudgetLine(cost_centre)" v-model="cost_centre.new_type">
                            <option value=""></option>
                            <option value="internal">I</option>
                            <option value="external">E</option>
                        </select>
                    </div>
                </td>
                <td class="accounts"></td>
                <td class="col-income cash plus">
                    <span class="unit">SEK</span>
                    <span><currency-input v-model="cost_centre.new_income" v-on:change="createBudgetLine(cost_centre)" class="income" /></span>
                </td>
                <td class="col-expenses cash minus">
                    <span class="unit">SEK</span>
                    <span><currency-input v-model="cost_centre.new_expenses" v-on:change="createBudgetLine(cost_centre)" class="expenses" /></span>
                </td>
                <td v-bind:class="{ cash: true }">
                    <span v-html="fmt(cost_centre.new_income - cost_centre.new_expenses)"></span> SEK
                </td>
            </tr>
        </tbody>
    </table>

    <div v-if="suggestion">
        <div class="alert">
            <div class="content">
                <h2>Du ändrar nu budgetförslaget <i v-html="suggestion.name"></i></h2>
                <p>
                    <span v-if="suggestion.authors.length === 1">Det kan bara visas av dig.</span>
                    <span v-if="suggestion.authors.length === 2">
                        Det kan bara visas av dig och 
                        <span v-html="suggestion.authors.filter(x => user != null && x.id != user.id).map(x => x.first_name + ' ' + x.last_name).join(', ')"></span>.
                    </span>
                    <span v-if="suggestion.authors.length > 2 && suggestion.authors.length < 5">
                        Det kan bara visas av  
                        <span v-html="suggestion.authors.filter(x => user && x.id != user.id).map(x => x.first_name + ' ' + x.last_name).join(', ')"></span> och dig.
                    </span>
                    <span v-if="suggestion.authors.length >= 5">
                        Det kan bara visas av dig och <span v-html="suggestion.authors.length"></span> andra.
                    </span>
                    Ändrade budgetrader är markerade med <span class="suggestion">gråblå bakgrund</span>.
                </p>
                <a v-bind:href="'/suggestions/' + suggestion.id + '/done'" class="button">Lämna redigeringsläget</a>
            </div>
        </div>
        <div class="alert-push"></div>
    </div>
</div>
</template>

<script>
       
    function fmt(val, decimals, decimalSign, thousandDelimiter) {
        decimals = decimals || 0;
        decimalSign = decimalSign || ',';
        thousandDelimiter = thousandDelimiter || ' ';
        let sign = val < 0 ? '-' : '';
        let absValString = String(parseInt(Math.abs(Number(val) || 0).toFixed(decimals)))
        let firstThousand = absValString.length > 3 ? absValString.length % 3 : 0;
        return sign 
            + (firstThousand > 0 ? absValString.substr(0, firstThousand) + thousandDelimiter : '')
            + (absValString.substr(firstThousand).replace(/(\d{3})(?=\d)/g, "$1" + thousandDelimiter))
            + (decimals > 0 ? decimalSign + Math.abs(val - Math.abs(Number(val) || 0).toFixed(0)).toFixed(decimals).slice(2) : '')
    }

    function defmt(val) {
        val = String(val || '').replace(/(\s)/g, "")
        if (val.indexOf(',') !== -1) {
            return val.substr(0, val.indexOf(','))
        }
        return val
    }



    export default {
        props: ['suggestion', 'committeeId', 'userId'],
        data: function () {
            return {
                committee: null,
                user: null
            }
        },
        created: function() {
            fetch('/api/committees/' + this.committeeId, {
                    method: 'GET',
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(res => res.json())
                .then(json => {
                    this.committee = json
                })
        },
        methods: {
            updateBudgetLine: function (budget_line) {
                budget_line.loading = true
                console.log('Updating')
                console.log(budget_line)
                fetch('/api/budget-lines/' + budget_line.id, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        'suggestion': this.suggestion ? this.suggestion.id : -1,
                        'income': budget_line.income * 100,
                        'expenses': budget_line.expenses * 100,
                        'name': budget_line.name,
                        'type': budget_line['type']
                    })
                })
                .then(res => res.json())
                .then(json => {
                    if (json !== false) {
                        this.committee = json
                        console.log(json)
                    } else {
                        console.log('No change')
                    }
                })
            },
            updateCostCentre: function (cost_centre) {
                cost_centre.loading = true
                fetch('/api/cost-centres/' + cost_centre.id, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        'name': cost_centre.name,
                        'speedledger_id': cost_centre.speedledger_id
                    })
                })
                .then(res => res.json())
                .then(json => {cost_centre.loading = false})
            },
            createBudgetLine: function (cost_center) {
                cost_centre.loading = true
                console.log('Adding')
                console.log(cost_center)
                fetch('/api/cost-centres/' + cost_center.id + '/budget-lines', {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        'suggestion_id': this.suggestion ? this.suggestion.id : -1,
                        'income': cost_center.new_income,
                        'expenses': cost_center.new_expenses,
                        'name': cost_center.new_name,
                        'type': cost_center.new_type
                    })
                })
                .then(res => res.json())
                .then(json => {
                    if (json !== false) {
                        this.committee = json.committee
                    }
                })
            },
            fmt: function(val, decimals, decimalSign, thousandDelimiter) {
                decimals = decimals || 0;
                decimalSign = decimalSign || ',';
                thousandDelimiter = thousandDelimiter || ' ';
                let sign = val < 0 ? '-' : '';
                let absValString = String(parseInt(Math.abs(Number(val) || 0).toFixed(decimals)))
                let firstThousand = absValString.length > 3 ? absValString.length % 3 : 0;
                return sign 
                    + (firstThousand > 0 ? absValString.substr(0, firstThousand) + thousandDelimiter : '')
                    + (absValString.substr(firstThousand).replace(/(\d{3})(?=\d)/g, "$1" + thousandDelimiter))
                    + (decimals > 0 ? decimalSign + Math.abs(val - Math.abs(Number(val) || 0).toFixed(0)).toFixed(decimals).slice(2) : '')
            },
            defmt: function(val) {
                val = String(val || '').replace(/(\s)/g, "")
                if (val.indexOf(',') !== -1) {
                    return val.substr(0, val.indexOf(','))
                }
                return val
            }
        }
    }
</script>
