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

    </div>
    <b-modal id="modal-1" title="BootstrapVue">
        <p class="my-4">Hello from modal!</p>
        <div class="form-group">
            <label>Referência</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Valor</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        $
                    </div>
                </div>
                <input type="text" class="form-control currency">
            </div>
        </div>
    </b-modal>
</div>
</template>

<script>
import ListComponent from "./ListComponent";
export default {
    name:'Index',
    components: {ListComponent},
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
