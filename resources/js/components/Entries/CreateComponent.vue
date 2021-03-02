<template>
    <b-modal
        id="modal-1"
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
    name: "CreateComponent",
    data(){
        return {
            form: new Form({
                name: '',
                description: '',
                value: '',
                date: '',
                type: 'receivable',
                category_id: 1
            })
        }
    },
    methods: {
        save(){
            this.form.post('/api/entries')
                .then(response => {

                })
                .catch(errors => {

                })
        }
    }
}
</script>

<style scoped>

</style>
