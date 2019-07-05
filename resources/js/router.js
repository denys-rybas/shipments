import VueRouter from 'vue-router';
import LoginComponent from './components/LoginComponent.vue' ;
import ShipmentComponent from './components/ShipmentComponent.vue' ;
export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'login',
            component: LoginComponent
        },
        {
            path: '/shipment',
            name: 'shipment',
            component: ShipmentComponent

        }
    ],

    mode: 'history'
})