<template>
    <tr>
        <td>
            <a href="#">
                <img alt="image" src="" class="rounded-circle" width="35" data-toggle="title" title="">
                <div class="d-inline-block ml-1">{{ item.name }}</div>
            </a>
        </td>
        <td>{{ item.name }} </td>
        <td>{{ item.type| typeUserText }}
            <div class="table-links">
                <a href="#">Ver</a>
                <div class="bullet"></div>
                <a href="javascript:;" @click="edit(item)">Editar</a>
                <div class="bullet"></div>
                <a href="javascript:;" @click="onDelete(item.id)" class="text-danger">Apagar</a>
            </div>
        </td>

        <td>{{ item.created_at | myDateComplete }} </td>
        <td>
            <b-badge :variant="colorStatus(item.status)">{{ item.status | statusUserText }}</b-badge>
        </td>
        <Create ref="createOrUpdate"></Create>
    </tr>
</template>

<script>
import Create from "./Create";
export default {
    name: "ListItemComponent",
    components: {Create},
    props: ['item'],
    mounted() {

    },
    methods: {
        colorStatus(value){
            switch (value){
                case 'active': return 'primary'; break;
                case 'suspended': return 'warning'; break;
                case 'blocked': return 'danger'; break;
            }
        },
        edit(item){
            let self = this
            self.$refs.createOrUpdate.edit(item)
        },
        onDelete(id){
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você não poderá reverter isso.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, apague!'
            }).then((result) => {
                //enviar requisição para o servidor
                if (result.value) {
                    axios.delete('api/users/' + id).then(response =>{
                        Swal.fire(
                            'Apagado',
                            response.data.message,
                            'success'
                        )
                        this.$emit('deleted')
                    }).catch(e => {
                        Swal.fire("Falhou!", e.message, "warning");
                    });
                }
            })
        },

    }
}
</script>

<style scoped>

</style>
