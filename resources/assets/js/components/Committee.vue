<template>
<div id="budget">
    <table v-bind:class="{budget:true, edit:suggestion}" v-if="committee_">
        <thead id="thead">
            <tr id="tr">
                <th v-if="suggestion"></th>
                <th class="name"><span class="input" v-html="committee_.name"></span></th>
                <th class="accounts"></th>
                <th class="accounts"></th>
                <th class="col-income plus cash"><span v-html="fmt(income / 100)"></span> SEK</th>
                <th class="col-expenses minus cash"><span v-html="fmt(expenses / 100)"></span> SEK</th>
                <th class="minus cash"><span v-html="fmt(this.balance / 100)"></span> SEK</th>
                <th v-bind:class="{cash:true, minus: committee_.booked < this.balance, plus: committee_.booked > this.balance}" v-if="booked"><span v-html="fmt(committee_.booked / 100)"></span> SEK</th>
            </tr>
        </thead>
        <cost-centre v-for="cost_centre in committee_.cost_centres" :booked="booked" :suggestion="suggestion" :cost-centre="cost_centre" :key="cost_centre.id" v-on:committee="setCommittee"></cost-centre>


        <tbody v-if="suggestion">
            <tr class="space">
                <td v-if="suggestion"></td>
                <td></td>
                <td class="accounts"></td>
                <td class="accounts"></td>
                <td class="col-income"></td>
                <td class="col-expenses"></td>
                <td></td>
            </tr>
            <tr class="header">
                <td v-if="suggestion"></td>
                <td class="name">
                    <span v-bind:class="{loading:committee_.loading}"></span>
                    <input type="text" placeholder="Skapa nytt kostnadsställe..." v-model="committee_.new_name" v-on:change="createCostCentre()">
                </td>
                <td class="accounts speedledger-id" colspan="2">
                    <input type="text" class="speedledger-id" placeholder="Bokf.-id" v-model="committee_.new_speedledger_id" v-on:change="createCostCentre()">
                </td>
                <td class="col-income plus cash"><span v-html="fmt(0)"></span> SEK</td>
                <td class="col-expenses minus cash"><span v-html="fmt(0)"></span> SEK</td>
                <td v-bind:class="{ cash:true }"><span v-html="fmt(0)"></span> SEK</td>
                <td v-bind:class="{ cash:true }" v-if="booked"><span v-html="fmt(0)"></span> SEK</td>
            </tr>
        </tbody>
    </table>

    <alert :suggestion="suggestion"></alert>
</div>
</template>

<script>
export default {
    props: ['suggestion', 'committee', 'user', 'booked'],
    data: function () {
        return {
            committee_: this.committee,
        }
    },
    methods: {
        setCommittee: function (c) {
            console.log("Sets committee: ", c)
            this.committee_ = c
        },
        createCostCentre: function () {
            this.committee_.loading = true;
            fetch('/api/committees/' + this.committee_.id + '/cost-centres', {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'name': this.committee_.new_name,
                    'speedledger_id': this.committee_.new_speedledger_id,
                })
            })
            .then(res => res.json())
            .then(json => {
                if (json !== false) {
                    this.committee_ = json.committee
                }
            })
        },
    },
    computed: {
        income: function () {
            return [].concat.apply(
                [],
                this.committee_.cost_centres.map(x =>
                    x.budget_lines.map(y =>
                        y.deleted ? 0 : (y.income * x.repetitions)
                    )
                )
            ).reduce((a, b) => parseInt(a) + parseInt(b), 0)
        },
        expenses: function () {
            return [].concat.apply(
                [],
                this.committee_.cost_centres.map(x =>
                    x.budget_lines.map(y =>
                        y.deleted ? 0 : (y.expenses * x.repetitions)
                    )
                )
            ).reduce((a, b) => parseInt(a) + parseInt(b), 0)
        },
        balance: function () {
            return this.income - this.expenses
        }
    },
    mounted: function () {
        this.committee_.cost_centres = this.committee_.cost_centres.filter(cc => cc.budget_lines.length > 0);
    }
}
</script>
