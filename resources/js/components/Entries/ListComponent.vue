<template>
    <div class="card">
        <div class="card-header">
            <h4>Todos Lançamentos</h4>
        </div>
        <div class="card-body">
            <div class="summary">
                <div class="summary-item">
                    <h6 class="mt-3">Item List <span class="text-muted">(4 Items)</span></h6>
                    <ListItemComponent v-for="entry in entries" :key="entry.id" :item="entry"></ListItemComponent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ListItemComponent from "./ListItemComponent";
import scrollable from "../../mixins/scrollable";
import paginable from "../../mixins/paginable";
export default {
    name: "ListComponent",
    components: {ListItemComponent},
    mixins: [scrollable, paginable],
    data(){
        return {
            entries: [],
        }
    },
    created() {
        let self = this;
        self.loadData();
        self.scroll();
    },
    methods: {
        loadData(){
            axios.get('/api/entries')
                .then(response => {
                    this.entries = response.data.data.data;
                    this.next_page_url = response.data.data.next_page_url;
                })
                .catch(error => {

                })
        },
        loadMore(){
            axios.get(this.next_page_url)
                .then(response => {
                    this.entries = [...this.entries, ...response.data.data.data];
                    this.next_page_url = response.data.data.next_page_url;
                    this.loading = false;
                })
                .catch(error => {

                })
        },
    }
}
</script>

<style scoped>

</style>
