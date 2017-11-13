<template>
<tr v-if="data && !data.deleted" v-bind:class="{ deleted: data.deleted || (data.income == 0 && data.expenses == 0), suggestion: suggestion && data.suggestion_id === suggestion.id }">
        <td v-if="suggestion" style="padding:2px;">
            <button v-if="suggestion" v-on:click="deleteBudgetLine" class="delete">
                <i v-if="!data.valid_from && !data.valid_to && !data.parent" class="fa fa-trash" aria-hidden="true"></i>
                <span v-else>0</span>
            </button>
        </td>
        <td class="description" style="width:400px;">
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
            <span v-else class="input income" v-html="fmt(data.income / 100)"></span>
        </td>
        <td class="col-expenses cash minus">
            <span class="unit">SEK</span>
            <span v-if="suggestion">
                <currency-input v-model="data.expenses" v-on:change="updateBudgetLine" class="expenses" />
            </span>
            <span v-else class="input expenses" v-html="fmt(data.expenses / 100)"></span>
        </td>
        <td v-bind:class="{ cash: true, plus: data.income > data.expenses, minus: data.income < data.expenses }">
            <span v-html="fmt((data.income - data.expenses) / 100)"></span> SEK
        </td>
        <td v-if="booked" v-bind:class="{ nowrap: true, cash: true, minus: data.booked < (data.income - data.expenses), plus: data.booked > (data.income - data.expenses) }">
            <span v-html="fmt(data.booked / 100)"></span> SEK
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
                    'income': this.data.income,
                    'expenses': this.data.expenses,
                    'name': this.data.name,
                    'type': this.budgetLine['type']
                })
            })
            .then(res => res.json())
            .then(json => {
                if (json !== false) {
                    this.loading = false
                    console.log('Done', json)
                    this.data = json
                }
            })
        }, 
        deleteBudgetLine: function () {
            this.loading = true
            fetch('/api/budget-lines/' + this.data.id, {
                method: 'DELETE',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'suggestion': this.suggestion ? this.suggestion.id : -1
                })
            })
            .then(res => res.json())
            .then(json => {
                if (json === true) {
                    this.loading = false
                    this.data.deleted = true
                    this.data.income = 0
                    this.data.expenses = 0
                    return
                }
                if (json !== false) {
                    this.loading = false
                    this.data = json
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