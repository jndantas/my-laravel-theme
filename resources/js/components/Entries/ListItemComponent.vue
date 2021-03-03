<template>
    <ul class="list-unstyled list-unstyled-border">
        <li class="media">
            <div class="dropdown mr-1">
                <a href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute;">
                    <div class="dropdown-title">Opções</div>
                    <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detalhes</a>
                    <a href="#" class="dropdown-item has-icon" @click.prevent="editItem(item.id)"><i class="fas fa-pencil-alt"></i> Editar</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-1" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Excluir</a>
                </div>
            </div>
            <div class="mr-3 rounded entry-icon" :class="'bg-' + item.type">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="media-body">
                <div class="media-right" :class="item.type">
                    ${{item.format_value}}
                </div>
                <div class="media-title">
                    <a href="#">{{item.name}}</a>
                </div>
                <div class="text-small text-muted">by
                    <a href="#">{{item.user.name}}</a>
                    <div class="bullet"></div>
                    {{item.date}}
<!--                    <div class="bullet" v-if="item.status === 'processing'"></div>-->
<!--                    <h6 style="display: inline" v-if="item.status === 'processing'"><span class="badge badge-info" :class="'badge-' + item.status">Processamento</span></h6>-->
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: "ListItemComponent",
    props: ['item'],
    mounted() {

    },
    methods: {
        editItem(id){
            EventBus.$emit('EditEntry', id);
        }
    }
}
</script>

<style scoped>
.payable {
    color: #b73838 !important;
}

.receivable {
    color: #318a31 !important;
}

.entry-icon {
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 22px;
    text-align: center;
}

.bg-payable {
    background-color: #fc544b !important;
}

.bg-receivable {
    background-color: #38c172 !important;
}

.badge-processing {
    background-color: #3abaf4;
}

.badge-paid {
    background-color: #63ed7a;
}

.entry-icon .fas {
    font-size: 22px;
    color: #fff;
}
</style>
