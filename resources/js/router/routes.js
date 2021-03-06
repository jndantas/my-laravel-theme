export const routes = [
    { path: '/home', name:'home', component: require('./../components/Dashboard.vue').default},
    { path: '/usuarios', name:'users', component: require('./../components/Users/Index.vue').default},
    { path: '/lancamentos', name:'entries', component: require('./../components/Entries/Index.vue').default},
    { path: '/categorias', name:'categories', component: require('./../components/Categories/Index.vue').default},
    { path: '*', component: require('./../components/NotFound.vue').default}
]
