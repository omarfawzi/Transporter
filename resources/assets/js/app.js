//import Vue from 'vue/dist/vue.js';
const Vue = require('vue');
const VueRouter = require('vue-router');
const VueResource = require('vue-resource');
const VueProgressBar = require('vue-progressbar');
const VueResourceProgressBarInterceptor = require('vue-resource-progressbar-interceptor');
Vue.use(VueRouter);
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');
Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');

import AuthLayout from '../components/AuthLayout.vue';
import Home from '../components/Home.vue';
import Register from '../components/Register.vue';
import ManageOrder from '../components/ManageOrder.vue';
import ForgetPassword from '../components/ForgetPassword.vue';
import SignIn from '../components/Signin.vue';
import Orders from '../components/Orders.vue';
import PlaceOrder from '../components/PlaceOrder.vue';
import DeliveryMen from '../components/DeliveryMen.vue';
import Money from '../components/Money.vue';

export default Vue;
export const router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'login',
            component: SignIn,
            meta: {
                progress: {
                    func: [
                        {call: 'color', modifier: 'temp', argument: '#008000'},
                        {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                        {call: 'location', modifier: 'temp', argument: 'top'},
                        {
                            call: 'transition',
                            modifier: 'temp',
                            argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                        }
                    ]
                }
            },
        }
        ,
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                progress: {
                    func: [
                        {call: 'color', modifier: 'temp', argument: '#008000'},
                        {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                        {call: 'location', modifier: 'temp', argument: 'top'},
                        {
                            call: 'transition',
                            modifier: 'temp',
                            argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                        }
                    ]
                }
            },
        }
        ,
        {
            path: '/forgetPassword',
            name: 'forgetPassword',
            component: ForgetPassword,
            meta: {
                progress: {
                    func: [
                        {call: 'color', modifier: 'temp', argument: '#008000'},
                        {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                        {call: 'location', modifier: 'temp', argument: 'top'},
                        {
                            call: 'transition',
                            modifier: 'temp',
                            argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                        }
                    ]
                }
            }
        }
        ,
        {
            path: '/home',
            name: 'home',
            component: Home,
            children: [
                {
                    path: 'orders',
                    name: 'orders',
                    component: Orders,
                    meta: {
                        progress: {
                            func: [
                                {call: 'color', modifier: 'temp', argument: '#008000'},
                                {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                                {call: 'location', modifier: 'temp', argument: 'top'},
                                {
                                    call: 'transition',
                                    modifier: 'temp',
                                    argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                                }
                            ]
                        }
                    }
                },
                {
                    path: 'placeOrder',
                    name: 'placeOrder',
                    component: PlaceOrder,
                    meta: {
                        progress: {
                            func: [
                                {call: 'color', modifier: 'temp', argument: '#008000'},
                                {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                                {call: 'location', modifier: 'temp', argument: 'top'},
                                {
                                    call: 'transition',
                                    modifier: 'temp',
                                    argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                                }
                            ]
                        }
                    }
                },
                {
                    path: 'manageOrder/:orderID',
                    component: ManageOrder,
                    meta: {
                        progress: {
                            func: [
                                {call: 'color', modifier: 'temp', argument: '#008000'},
                                {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                                {call: 'location', modifier: 'temp', argument: 'top'},
                                {
                                    call: 'transition',
                                    modifier: 'temp',
                                    argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                                }
                            ]
                        }
                    }
                }
                ,
                {
                    path: 'deliveryMen',
                    name: 'deliveryMen',
                    component: DeliveryMen,
                    meta: {
                        progress: {
                            func: [
                                {call: 'color', modifier: 'temp', argument: '#008000'},
                                {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                                {call: 'location', modifier: 'temp', argument: 'top'},
                                {
                                    call: 'transition',
                                    modifier: 'temp',
                                    argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                                }
                            ]
                        }
                    }
                },
                {
                    path: 'money',
                    name: 'money',
                    component: Money,
                    meta: {
                        progress: {
                            func: [
                                {call: 'color', modifier: 'temp', argument: '#008000'},
                                {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                                {call: 'location', modifier: 'temp', argument: 'top'},
                                {
                                    call: 'transition',
                                    modifier: 'temp',
                                    argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                                }
                            ]
                        }
                    }
                }
            ],
            meta: {
                progress: {
                    func: [
                        {call: 'color', modifier: 'temp', argument: '#008000'},
                        {call: 'fail', modifier: 'temp', argument: '#6e0000'},
                        {call: 'location', modifier: 'temp', argument: 'top'},
                        {
                            call: 'transition',
                            modifier: 'temp',
                            argument: {speed: '1.5s', opacity: '0.6s', termination: 400}
                        }
                    ]
                }
            }
        }
    ]
});
const options = {
    color: '#EB5E28',
    failedColor: '#874b4b',
    thickness: '5px'
};
Vue.use(VueProgressBar,options);
Vue.use(VueResourceProgressBarInterceptor);

new Vue({
    el: '#app',
    router,
    render: h => h(AuthLayout)
});