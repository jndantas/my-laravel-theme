export const routes = [
    { path: '/home', name:'home', component: require('./../components/Dashboard.vue').default},
    { path: '/usuarios', name:'users', component: require('./../components/Users/Index.vue').default},
    { path: '/lancamentos', name:'entries', component: require('./../components/Entries/Index.vue').default},
]
