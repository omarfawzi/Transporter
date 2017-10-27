<template>
    <div class="wrapper">



        <div class="sidebar" data-background-color="white" data-active-color="danger">
            <!--

                Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"

                Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"

            -->

            <div class="sidebar-wrapper">

                <div class="logo">

                    <a class="simple-text">

                        Dashboard

                    </a>

                </div>
                <ul class="nav">
                    <router-link  :to="{name:item.route}" tag="li" v-for="item in sidebar" v-bind:class="item.active" v-on:click.native="toggleActive">
                        <a>
                            <i v-bind:class="item.icon"></i>
                            <p>{{item.label}}</p>
                        </a>
                    </router-link>
                </ul>
            </div>

        </div>

        <div class="main-panel">

            <nav class="navbar navbar-default">

                <div class="container-fluid">

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle">

                            <span class="sr-only">Toggle navigation</span>

                            <span class="icon-bar bar1"></span>

                            <span class="icon-bar bar2"></span>

                            <span class="icon-bar bar3"></span>

                        </button>

                        <a href="javascript:;" class="navbar-brand">Transporter</a>

                    </div>

                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <i class="ti-user"></i>

                                    <p v-if="auth.user.authenticated">{{ auth.user.profile.name }}</p>

                                    <span style="font-size:0.6em">admin</span>

                                    <b class="caret"></b>

                                </a>

                                <ul class="dropdown-menu">
                                    <router-link  :to="{name:'register'}" tag="li">
                                        <a>
                                            <i class="fa fa-users"></i>
                                            Add Admin
                                            </a>
                                    </router-link>
                                    <li>
                                        <a href="javascript:;"  v-on:click="signout">
                                            <i class="fa fa-sign-out"></i>
                                        Sign Out
                                        </a>
                                    </li>

                                </ul>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>


            <router-view></router-view>


            <footer class="footer navbar-default" style="bottom: 0;width:100%;position: absolute;">

                <div class="container-fluid">

                    <div class="copyright pull-right">

                        &copy; 2017 Transporter. All Rights Reserved

                    </div>

                </div>

            </footer>



        </div>

    </div>
</template>
<script>
    import auth from '../js/auth.js'
    export default {
        data() {
            return {
                sidebar: [
                    {route:'orders',label:'Orders',icon:'fa fa-truck',active:'active'}
                    ,
                    {route:'placeOrder',label:'Place Order',icon:'fa fa-cog',active:''}
                    ,
                    {route:'deliveryMen',label:'Delivery Men',icon:'fa fa-male',active:''}
                    ,
                    {route:'money',label:'Money',icon:'fa fa-money',active:''}
                ],
                auth: auth
            }
        },
        methods: {
            signout() {
                auth.signout();
            },
            toggleActive() {
                for(var i = 0; i<4; i++) {
                    if (this.sidebar[i].route == this.$route.name){
                        this.sidebar[i].active = 'active';
                    }
                    else {
                        this.sidebar[i].active = '';
                    }
                }
            }
        },
        mounted() {
            auth.check(false);
            this.toggleActive();
        }
    }

</script>
