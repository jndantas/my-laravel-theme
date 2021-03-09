<template>
    <div class="ml-auto">
        <div class="text-right">
            <div>Saldo</div>
            <div class="balance" :class="balance.status">${{ balance.format_value }}</div>
        </div>
        <div>(Projetado: <span :class="balance.projected_status">${{ balance.format_projected_value }}</span>)</div>
    </div>
</template>

<script>
export default {
    name: "BalanceComponent",
    data(){
        return {
            balance: null,
            receivable: null,
            payable: null,
            params: {}
        }
    },
    mounted() {

    },
    created() {

    },
    methods: {
        setParams(params){
            this.params = params;
            return this;
        },
        loadData(){
            let self = this;
            axios.get('/api/wallets/balance', {
                params: self.params
            }).then(response => {
                self.balance = response.data.data.balance;
                self.receivable = response.data.data.receivable;
                self.payable = response.data.data.payable;
            }).catch(error => {

            });
        }
    }
}
</script>

<style scoped>
.balance {
    font-size: 26px;
    font-weight: 700;
    color: #34395e;
    padding-bottom: 0;
}

.negative {
    color: #b73838 !important;
}

.positive {
    color: #318a31 !important;
}
</style>
