import Vue from './app.js';
import {router} from './app.js';
export default {
    user: {
        authenticated: false,
        profile: null
    },
    check(flag) {
        if (localStorage.getItem('id_token') !== null) {
            Vue.http.get(
                'api/user',
            ).then(response => {
                this.user.authenticated = true;
                this.user.profile = response.data.data;
            });
            if (flag)
                router.push({name:'orders'});
        }
        else {
            if (!flag) {
                router.push({name:'login'});
            }
        }
    },
    register(context,email,password,password_confirmation,name){
        context.success = false;
        context.error = false;
        Vue.http.post(
            'api/register',
            {
                email: email,
                password: password,
                name:name,
                password_confirmation:password_confirmation
            }
        ).then(response => {
            context.success = true;
        }, response => {
            context.response = response.data;
            context.error = true;
        })
    },
    login(context, email, password) {
        Vue.http.post(
            'api/login',
            {
                email: email,
                password: password
            }
        ).then(response => {
            context.error = false;
            localStorage.setItem('id_token', response.data.meta.token);
            Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');
            this.user.authenticated = true;
            this.user.profile = response.data.data;
            router.push({name: 'orders'});
        }, response => {
            context.error = true
        })
    },
    resetPassword(context){
        console.log(context.email);

    },
    signout() {
        localStorage.removeItem('id_token');
        this.user.authenticated = false;
        this.user.profile = null;
        router.push({
            name: 'login'
        })
    }
}