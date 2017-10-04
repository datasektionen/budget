<template>
<tr v-bind:class="{ suggestion: suggestion && budgetLine.suggestion_id === suggestion.id, deleted: budgetLine.deleted }">
        <td class="description">
            <span v-bind:class="{loading:budgetLine.loading}"></span>
            <input v-if="suggestion" class="name" type="text" v-model="budgetLine.name" v-on:change="updateBudgetLine">
            <span v-else class="input" v-html="budgetLine.name"></span>
        </td>
        <td class="accounts">
            <div v-if="suggestion" class="select small">
                <select v-model="budgetLine['type']" v-on:change="updateBudgetLine">
                    <option value="internal">I</option>
                    <option value="external">E</option>
                </select>
            </div>
            <span v-else v-html="budgetLine['type'] == 'internal' ? 'I' : 'E'"></span>
        </td>
        <td class="accounts" v-html="budgetLine.accounts.map((x) => x.number).join(', ')"></td>
        <td class="col-income cash plus">
            <span class="unit">SEK</span>
            <span v-if="suggestion">
                <currency-input v-model="budgetLine.income" v-on:change="updateBudgetLine" class="income" />
            </span>
            <span v-if="suggestion === null" class="input income" v-html="fmt(budgetLine.income)"></span>
        </td>
        <td class="col-expenses cash minus">
            <span class="unit">SEK</span>
            <span v-if="suggestion">
                <currency-input v-model="budgetLine.expenses" v-on:change="updateBudgetLine" class="expenses" />
            </span>
            <span v-if="suggestion === null" class="input expenses" v-html="fmt(budgetLine.expenses)"></span>
        </td>
        <td v-bind:class="{ cash: true, plus: budgetLine.income > budgetLine.expenses, minus: budgetLine.income < budgetLine.expenses }">
            <span v-html="fmt(budgetLine.income - budgetLine.expenses)"></span> SEK
        </td>
    </tr>
</template>

<script>
export default {
    props: ['budgetLine', 'suggestion'],
    methods: {
        updateBudgetLine: function () {
            this.budgetLine.loading = true
            console.log('Updating')
            fetch('/api/budget-lines/' + this.budgetLine.id, {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'suggestion': this.suggestion ? this.suggestion.id : -1,
                    'income': this.budgetLine.income * 100,
                    'expenses': this.budgetLine.expenses * 100,
                    'name': this.budgetLine.name,
                    'type': this.budgetLine['type']
                })
            })
            .then(res => res.json())
            .then(json => {
                if (json !== false) {
					this.budgetLine.loading = false
                	console.log(json)
                    this.$emit('committee', json)
                }
            })
        }
    }
}
</script>