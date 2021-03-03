<template>
<div>
    <div class="section-header">
        <h1>Categorias</h1>
        <div class="section-header-button">
            <b-button @click="create()" class="btn btn-primary">Novo</b-button>
         </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Categorias</a></div>
            <div class="breadcrumb-item">Todos Categorias</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Categorias</h2>
        <p class="section-lead">
            Você pode gerenciar todas categorias, editar, apagar e mais.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <ListComponent ref="listComponent"></ListComponent>
            </div>
        </div>

    </div>
    <Create ref="createOrUpdate"></Create>
</div>
</template>

<script>
import Create from "./Create";
import ListComponent from "./ListComponent";
export default {
    name:'Index',
    components: {ListComponent, Create},
    mounted() {

    },
    data(){
        return {
            categories: [],
        }
    },
    computed:{},
    methods: {
        create(){
            let self = this
            self.$refs.createOrUpdate.show()
        },
        onDelete(id){
        },
        onEdit(){
            let self = this
            self.$refs.listComponent.edit()
        }
    },
    created(){
    }
}
</script>
