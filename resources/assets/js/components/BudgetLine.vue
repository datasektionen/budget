<template>
<tr v-if="data" v-bind:class="{ suggestion: suggestion && data.suggestion_id === suggestion.id, deleted: data.deleted }">
        <td class="description">
            <span v-bind:class="{loading: loading}"></span>
            <input v-if="suggestion" class="name" type="text" v-model="data.name" v-on:change="updateBudgetLine">
            <span v-else class="input" v-html="data.name"></span>
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
        <td class="accounts" v-html="replaceIntervals(data.accounts.map((x) => x.number)).join(', ')"></td>
        <td class="col-income cash plus">
            <span class="unit">SEK</span>
            <span v-if="suggestion">
                <currency-input v-model="data.income" v-on:change="updateBudgetLine" class="income" />
            </span>
            <span v-else class="input income" v-html="fmt(data.income)"></span>
        </td>
        <td class="col-expenses cash minus">
            <span class="unit">SEK</span>
            <span v-if="suggestion">
                <currency-input v-model="data.expenses" v-on:change="updateBudgetLine" class="expenses" />
            </span>
            <span v-else class="input expenses" v-html="fmt(data.expenses)"></span>
        </td>
        <td v-bind:class="{ cash: true, plus: data.income > data.expenses, minus: data.income < data.expenses }">
            <span v-html="fmt(data.income - data.expenses)"></span> SEK
        </td>
        <td v-if="booked" v-bind:class="{ nowrap: true, cash: true, minus: data.booked < (data.income - data.expenses), plus: data.booked > (data.income - data.expenses) }">
            <span v-html="fmt(data.booked)"></span> SEK
        </td>
    </tr>
</template>

<script>
export default {
    props: ['budgetLine', 'suggestion', 'booked'],
    data() { 
        return {
            'data': undefined,
            'loading': false
        }
    },
    created() {
      this.data = this.budgetLine  
    },
    methods: {
        updateBudgetLine: function () {
            this.loading = true
            console.log('Updating')
            fetch('/api/budget-lines/' + this.data.id, {
                method: 'PUT',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'suggestion': this.suggestion ? this.suggestion.id : -1,
                    'income': this.data.income * 100,
                    'expenses': this.data.expenses * 100,
                    'name': this.data.name,
                    'type': this.budgetLine['type']
                })
            })
            .then(res => res.json())
            .then(json => {
                if (json !== false) {
                    this.loading = false
                    console.log('Done')
                    //this.$emit('committee', json)
                }
            })
        }, 
        replaceIntervals: function (x) {
            if (x.length <= 1) {
                return x
            }
            var res = [];
            var intervalStart = -1;
            for (var i = 1; i < x.length; i++) {
                if (x[i - 1] == x[i] - 1) {
                    if (intervalStart === -1) {
                        intervalStart = x[i - 1];
                    } else {
                        // Skip
                    }
                } else {
                    if (intervalStart === -1) {
                        res.push(x[i - 1]);
                        intervalStart = -1
                    } else {
                        res.push(intervalStart + '-' + x[i - 1]);
                        intervalStart = -1
                    }
                }
            }
            if (intervalStart !== -1) {
                res.push(intervalStart + '-' + x[x.length - 1]);
            } else {
                res.push(x[x.length - 1])
            }
            return res
        }
    }
}
</script>