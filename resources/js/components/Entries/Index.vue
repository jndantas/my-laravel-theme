<template>
<div>
    <div class="section-header">
        <h1>Lançamentos</h1>
        <div class="section-header-button">
            <b-button v-b-modal.modal-1 class="btn btn-primary">Novo</b-button>
         </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Lançamentos</a></div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Lançamentos</h2>
        <p class="section-lead">
            Você pode gerenciar todos lançamentos, editar, apagar e mais.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <ListComponent></ListComponent>
            </div>
        </div>
        <CreateComponent></CreateComponent>
    </div>
</div>
</template>

<script>
import ListComponent from "./ListComponent";
import CreateComponent from "./CreateComponent";
export default {
    name:'Index',
    components: {CreateComponent, ListComponent},
    mounted() {
    },
    data(){
        return {
        }
    },
    computed:{},
    methods: {
        load(){

        },
        create(){

        },
        onDelete(id){
        },
        onEdit(object){

        }
    },
    created(){
        let self = this
        self.load()
    }
}
</script>
