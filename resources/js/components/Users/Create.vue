<template>
    <b-modal ref="createOrUpdateUser" hide-footer :title="editMode ? 'Editar Usuário' : 'Novo Usuário'">
        <form @submit.prevent="editMode ? update() : create()">
            <div class="form-group">
                <label for="name">Nome Completo</label>
                <input v-model="form.name" id="name" type="text" name="name"
                       placeholder="Nome"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input v-model="form.email" id="email" type="text" name="email"
                       placeholder="Email"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                <has-error :form="form" field="email"></has-error>
            </div>

            <div class="form-group">
                <label for="type">Função</label>
                <select name="type" v-model="form.type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                    <option value="">Selecione a Função</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="view">Visualizador</option>
                </select>
                <has-error :form="form" field="type"></has-error>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="type" v-model="form.status" id="status" class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                    <option value="">Selecione o Status</option>
                    <option value="active">Ativo</option>
                    <option value="suspended">Suspenso</option>
                    <option value="blocked">Bloqueado</option>
                </select>
                <has-error :form="form" field="status"></has-error>
            </div>

            <div class="form-group">
                <label for="password">Senha primeiro Acesso</label>
                <input v-model="form.password" id="password" type="password" name="password"
                       placeholder="Senha"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                <has-error :form="form" field="password"></has-error>
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
                email: '',
                password: '',
                type: '',
                status: '',
            })
        }
    },
    methods: {
        show() {
            this.form.reset();
            this.$refs.createOrUpdateUser.show();
        },
        hideModal() {
            this.$refs['createOrUpdateUser'].hide()
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
                const response = await self.form.post('api/users')
                    .then(() =>{
                        Fire.$emit('AfterCreateUser');
                        self.hideModal()
                        Toast.fire({
                            icon: 'success',
                            title: 'Usuário Criado com Sucesso'
                        })
                        self.$Progress.finish();
                    })
            } catch (e) {
                if (e){
                    self.$Progress.fail();
                    if(e.response.status !== 422){
                        await Toast.fire({
                            icon: 'error',
                            title: e.message
                        })
                    }

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
