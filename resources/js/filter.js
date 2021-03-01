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
});
