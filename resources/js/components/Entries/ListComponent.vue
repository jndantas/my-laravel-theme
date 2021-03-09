<template>
    <div class="card">
        <div class="card-header">
            <MonthFilterComponent @changed="applyMonthFilter"></MonthFilterComponent>
            <BalanceComponent ref="balance"></BalanceComponent>
        </div>
        <div class="card-body">
            <MonthBalanceComponent ref="monthBalance"></MonthBalanceComponent>
            <div class="summary">
                <div class="summary-item">
                    <h6 class="mt-3">Item List <span class="text-muted">(4 Items)</span></h6>
                    <ListItemComponent
                        v-for="entry in entries"
                        :key="entry.id"
                        :item="entry"
                        @deleted="loadData">
                    </ListItemComponent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ListItemComponent from "./ListItemComponent";
import scrollable from "../../mixins/scrollable";
import paginable from "../../mixins/paginable";
import MonthFilterComponent from "./MonthFilterComponent";
import MonthBalanceComponent from "./MonthBalanceComponent";
import BalanceComponent from "./BalanceComponent";
export default {
    name: "ListComponent",
    components: {BalanceComponent, MonthBalanceComponent, MonthFilterComponent, ListItemComponent},
    mixins: [scrollable, paginable],
    data(){
        return {
            entries: [],
            params: {},
            balance_value: '875,25',
            balance: 'positive',
        }
    },
    created() {
        Fire.$on('AfterCreateEntry', self.loadData);
    },
    mounted() {
        let self = this;
        self.loadData();
        self.scroll();
    },
    destroyed() {
        Fire.$off('AfterCreateEntry');
    },
    methods: {
        loadData(){
            axios.get('/api/entries', {
                params: this.params
            })
                .then(response => {
                    this.entries = response.data.data.data;
                    this.next_page_url = response.data.data.next_page_url;
                })
                .catch(error => {

                });
        },
        loadMore(){
            axios.get(this.next_page_url, {
                params: this.params
            })
                .then(response => {
                    this.entries = [...this.entries, ...response.data.data.data];
                    this.next_page_url = response.data.data.next_page_url;
                    this.loading = false;
                })
                .catch(error => {

                })
        },
        applyMonthFilter(data){
            this.params = data;
            this.loadData();
            this.$refs.monthBalance
                .setParams(data)
                .loadData();
            this.$refs.balance
                .setParams(data)
                .loadData();
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
