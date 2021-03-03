import moment from 'moment';
moment.locale("pt-BR");

Vue.filter('myDateComplete', function(value) {
    return moment(value).format('LLL');
});

Vue.filter('statusUserText', function(value) {
    switch (value){
        case 'active': return 'Ativo'; break;
        case 'suspended': return 'Suspenso'; break;
        case 'blocked': return 'Bloqueado'; break;
    }
})

Vue.filter('typeUserText', function(value) {
    switch (value){
        case 'admin': return 'Administrador'; break;
        case 'view': return 'Visualizador'; break;
        case 'editor': return 'Editor'; break;
    }
});


Vue.filter('typeCategoryText', function(value) {
    switch (value){
        case 'receivable': return 'Recebimentos'; break;
        case 'payable': return 'Despesas'; break;
    }
});
