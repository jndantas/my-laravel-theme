<template>
    <ul class="list-unstyled list-unstyled-border">
        <li class="media">
            <a href="#">
                <img alt="image" class="mr-3 rounded" width="50" src="assets/img/products/product-4-50.png">
            </a>
            <div class="media-body">
                <div class="media-right" :class="item.type">${{item.format_value}}</div>
                <div class="media-title"><a href="#">{{item.name}}</a></div>
                <div class="text-small text-muted">by <a href="#">{{item.user.name}}</a> <div class="bullet"></div> {{item.date}}</div>
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
</style>
