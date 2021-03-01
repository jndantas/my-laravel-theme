<template>
    <div class="card">
        <div class="card-header">
            <h4>Todos Usuários</h4>
        </div>
        <div class="card-body">
            <div class="summary">
                <div class="summary-item">
                    <h6 class="mt-3">Usuários <span class="text-muted">(4 Items)</span></h6>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Avatar</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Criado em</th>
                        <th>Status</th>
                    </tr>
                    <ListItemComponent ref="listItem" v-for="user in users" :key="user.id" :item="user"></ListItemComponent>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import ListItemComponent from "./ListItemComponent"
import scrollable from "../../mixins/scrollable";
import paginable from "../../mixins/paginable";
export default {
    name: "ListComponent",
    components: {ListItemComponent},
    mixins: [scrollable, paginable],
    data(){
        return {
            users: [],
        }
    },
    created() {
        let self = this;
        self.loadData();
        self.scroll();
    },
    methods: {
        loadData(){
            this.$Progress.start()
            axios.get('/api/users')
                .then(response => {
                    this.users = response.data.data;
                    this.next_page_url = response.data.data.next_page_url;
                    this.$Progress.finish();
                })
                .catch(error => {
                    this.$Progress.fail();
                })
        },
        loadMore(){
            axios.get(this.next_page_url)
                .then(response => {
                    this.users = [...this.users, ...response.data.data.data];
                    this.next_page_url = response.data.data.next_page_url;
                    this.loading = false;
                })
                .catch(error => {

                })
        },
        edit(){
            let self = this
            self.$refs.listItem.edit()
        }
    }
}
</script>

<style scoped>

</style>
