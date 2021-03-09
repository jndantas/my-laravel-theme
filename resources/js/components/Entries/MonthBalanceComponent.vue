<template>
    <div v-if="balance" class="statistic-details">
        <div class="statistic-details-item p-2">
<!--            <div class="text-small text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</div>-->
            <div class="detail-value positive">${{ receivable.format_value }}</div>
            <div class="detail-name">Receitas</div>
        </div>
        <div class="statistic-details-item p-2">
<!--            <div class="text-small text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</div>-->
            <div class="detail-value negative">${{ payable.format_value }}</div>
            <div class="detail-name">Despesas</div>
        </div>
        <div class="statistic-details-item p-2 ml-auto mr-auto">
<!--            <div class="text-small text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</div>-->
            <div class="detail-value" :class="balance.status">${{ balance.format_value }}</div>
            <div class="detail-name">Saldo no mês</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MonthBalanceComponent",
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
            axios.get('/api/wallets/month/balance', {
                params: self.params
            }).then(response => {
                self.balance = response.data.data.balance;
                self.receivable = response.data.data.receivable;
                self.payable = response.data.data.payable;
            }).catch(error => {

            })
        }
    }
}
</script>

<style scoped>
.negative {
    color: #b73838 !important;
}

.positive {
    color: #318a31 !important;
}
</style>
