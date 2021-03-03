<template>
    <b-modal
        ref="modal"
        title="Novo lançamento"
        @ok.prevent="save"
        ok-title="Cadastrar"
        cancel-title="Cancelar"
    >
        <p class="my-4">Cadastre abaixo o novo lançamento!</p>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="type_receivable" name="type" class="custom-control-input" value="receivable" v-model="form.type">
            <label class="custom-control-label" for="type_receivable">A Receber</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="type_payable" name="type" class="custom-control-input" value="payable" v-model="form.type">
            <label class="custom-control-label" for="type_payable">A Pagar</label>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" v-model="form.category_id" :class="{ 'is-invalid': form.errors.has('category_id') }">
                <option></option>
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>
            <has-error :form="form" field="category_id"></has-error>
        </div>
        <div class="form-group">
            <label>Referência</label>
            <input type="text" class="form-control" v-model="form.name" name="name" :class="{ 'is-invalid': form.errors.has('name') }">
            <has-error :form="form" field="name"></has-error>
        </div>
        <div class="form-group">
            <label>Valor</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        R$
                    </div>
                </div>
                <input type="text" id="text_currency" class="form-control currency"
                       v-cleave="{numeral: true, numeralDecimalMark: ',', delimiter: '.', numeralPositiveOnly: true}"
                       v-model="form.value"
                       :class="{ 'is-invalid': form.errors.has('value') }"
                >
                <has-error :form="form" field="value"></has-error>
            </div>
        </div>
        <div class="form-group">
            <label>Data</label>
            <input type="text" class="form-control datemask" placeholder="DD/MM/YYYY"
                   v-cleave="{date: true, datePattern : ['d', 'm', 'Y']}"
                   v-model="form.date"
                   :class="{ 'is-invalid': form.errors.has('value') }"
            >
            <has-error :form="form" field="date"></has-error>
        </div>
    </b-modal>
</template>

<script>
export default {
    name: "EditComponent",
    data(){
        return {
            form: new Form({
                name: '',
                description: '',
                value: '',
                date: '',
                type: 'receivable',
                category_id: null
            }),
            categories: []
        }
    },
    created() {
        EventBus.$on('edit-entry', this.load)
    },
    mounted() {
        this.loadCategories();
    },
    watch:{
        'form.type'(value){
            this.loadCategories();
            // this.form.category_id = null;
        }
    },
    methods: {
        load(id){
            axios.get('/api/entries/' + id)
                .then(response => {
                    let data = response.data.data;
                    this.form.id = data.id;
                    this.form.name = data.name;
                    this.form.description = data.description;
                    this.form.value = data.format_value;
                    this.form.date = data.date;
                    this.form.type = data.type;
                    this.form.category_id = data.category_id;
                    this.$refs.modal.show();
                })
                .catch(error => {

                });
        },
        save(){
            this.form.put('/api/entries/' + this.form.id)
                .then(response => {

                })
                .catch(errors => {

                })
        },
        loadCategories(){
            axios.get('/api/categories?type=' + this.form.type)
                .then(response => {
                    this.categories = response.data.data;
                    if(!this.categories.some(v => v.id === this.form.category_id)){
                        this.form.category_id = null;
                    }
                })
                .catch(error => {

                });
        }
    }
}
</script>

<style scoped>

</style>
