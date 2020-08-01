import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Clients from './components/Clients'
import Client from './components/Client'
import Form from './components/Form'

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'clients',
            component: Clients,
            props: { title: "Список клиентов" }
        },
        {
            path: '/clients/:id',
            name: 'showClient',
            component: Client,
            props: { title: "Информация о клиенте" }
        },
        {
            path: '/clients/add',
            name: 'addCleint',
            component: Form,
            props: { title: "Создание клиента" }
        },
        {
            path: '/clients/edit/:id',
            name: 'editClient',
            component: Form,
            props: { title: "Изменение клиента" }
        },
    ],
});
