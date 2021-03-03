<template>
    <b-modal ref="createOrUpdateCategory" hide-footer :title="editMode ? 'Editar Categoria' : 'Nova Categoria'">
        <form @submit.prevent="editMode ? update() : create()">
            <div class="form-group">
                <label for="name">Nome</label>
                <input v-model="form.name" id="name" type="text" name="name"
                       placeholder="Nome"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                <has-error :form="form" field="name"></has-error>
            </div>

            <div class="form-group">
                <label for="type">Tipo</label>
                <select name="type" v-model="form.type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                    <option value="">Selecione o Tipo</option>
                    <option value="receivable">Recebimentos</option>
                    <option value="payable">Despesas</option>
                </select>
                <has-error :form="form" field="type"></has-error>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" @click="hideModal">Fechar</button>
                <button type="submit" class="btn btn-primary">{{ editMode ? 'Salvar' : 'Criar' }}</button>
            </div>
        </form>
    </b-modal>
</template>

<script>
// import Swal from 'sweetalert2';
export default {
    name:'Create',
    mounted() {

    },
    data() {
        return {
            editMode: false,
            form: new Form({
                id:'',
                name : '',
                type: '',
            })
        }
    },
    methods: {
        show() {
            this.form.reset();
            this.$refs.createOrUpdateCategory.show();
        },
        hideModal() {
            this.$refs['createOrUpdateCategory'].hide()
        },
        edit(object){
            let self = this
            self.editMode = true;
            self.form.reset();
            this.$refs.createOrUpdateUser.show();
            self.form.fill(object)
        },
        async create() {
            let self = this
            self.$Progress.start()
            try {
                const response = await self.form.post('api/categories')
                    .then(() =>{
                        Fire.$emit('AfterCreateCategory');
                        self.hideModal()
                        Toast.fire({
                            icon: 'success',
                            title: 'Categoria Criada com Sucesso'
                        })
                        console.log(response)
                        self.$Progress.finish();
                    })
            } catch (e) {
                if (e){
                    console.log(e)
                    self.$Progress.fail();
                        await Toast.fire({
                            icon: 'error',
                            title: e.message
                        })


                }
            }
        },
        update(id){
            let self = this
            self.$Progress.start();
            self.form.put('api/users/'+this.form.id)
                .then(response => {
                    self.hideModal()
                    Swal.fire(
                        'Atualizado',
                        response.data.message,
                        'success'
                    )
                    self.$Progress.finish();
                    Fire.$emit('AfterCreateUser');
                })
                .catch(() => {
                    self.$Progress.fail();
                });

        },
    }
}
</script>
