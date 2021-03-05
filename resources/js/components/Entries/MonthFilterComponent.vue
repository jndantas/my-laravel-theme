<template>
    <div>
        <a href="#" @click.prevent="previousMonth"><i class="fa fa-chevron-left"></i></a>
        <span class="mr-2 ml-2">
            {{textFilter}}
        </span>
        <a href="#" @click.prevent="nextMonth"><i class="fa fa-chevron-right"></i></a>
    </div>
</template>

<script>
import ListItemComponent from "./ListItemComponent";
import scrollable from "../../mixins/scrollable";
import paginable from "../../mixins/paginable";
export default {
    name: "MonthFilterComponent",
    components: {ListItemComponent},
    mixins: [scrollable, paginable],
    data(){
        return {
            month: 3,
            year: 2021,
            months: [
                'Jan',
                'Fev',
                'Mar',
                'Abr',
                'Mai',
                'Jun',
                'Jul',
                'Ago',
                'Set',
                'Out',
                'Nov',
                'Dez',
            ]
        }
    },
    created() {
        let self = this;
        self.loadData();
        self.scroll();
        Fire.$on('AfterCreateEntry', self.loadData);
    },
    destroyed() {
        Fire.$off('AfterCreateEntry');
    },
    watch: {
        month(value){
            this.$emit('changed', {month: this.month, year: this.year});
        }
    },
    computed: {
        textFilter(){
            return this.months[this.month - 1] + '/' + this.year;
        }
    },
    methods: {
        previousMonth(){
            let month = this.month - 1;
            if(month < 1){
                month = month + 12;
                this.year--;
            }
            this.month = month;
        },
        nextMonth(){
            let month = this.month + 1;
            if(month > 12){
                month = month - 12;
                this.year++;
            }
            this.month = month;
        },
    },
}
</script>

<style scoped>

</style>
