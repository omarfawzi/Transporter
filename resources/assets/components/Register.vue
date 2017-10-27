<template>
    <div class="wrapper">

        <nav class="navbar navbar-default">

            <div class="container-fluid">

                <div class="navbar-header">
                    <router-link :to="{ name: 'orders'}" class="navbar-brand">Transporter</router-link>
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
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">
                            <div class="alert alert-danger" v-if="error && !success">
                                <p>There was an error, unable to complete registration.</p>
                            </div>
                            <div class="alert alert-success" v-if="success">
                                <p>Registration completed. You can now sign in.</p>
                            </div>
                            <form class="form-horizontal" role="form" v-on:submit="register" v-if="!success">
                                <div class="form-group">
                                    <label for="name" class="col-md-3 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control border-input" v-model="name"
                                               placeholder="Gavin Belson" required>
                                    </div>
                                </div>
                                <div class="form-group" v-bind:class="{ 'has-error': error && response.email }">
                                    <label for="email" class="col-md-3 control-label">E-mail</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control border-input"
                                               placeholder="gavin.belson@hooli.com" v-model="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <center>
                                    <span class="help-block" style="color: red;" v-if="error && response.email">{{ response.email}}</span>
                                    </center>
                                </div>
                                <div class="form-group" v-bind:class="{ 'has-error': error && response.password }">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control border-input"
                                               placeholder="********" v-model="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <center>
                                    <span class="help-block" style="color: red;" v-if="error && response.password">{{ response.password}}</span>
                                    </center>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password_confirmation" class="form-control border-input"
                                               placeholder="********" v-model="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <center>
                                    <button type="submit" class="btn btn-l btn-primary">
                                        Register
                                    </button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer navbar-default" style="bottom: 0;width:100%;position: absolute;">

            <div class="container-fluid">

                <div class="copyright pull-right">
                    &copy; 2017 Transporter. All Rights Reserved
                </div>

            </div>

        </footer>
    </div>
</template>
<script>
    import auth from '../js/auth.js';
    export default {
        data() {
            return {
                name: null,
                email: null,
                password: null,
                passwordError: false,
                error: false,
                response: null,
                success: false,
                password_confirmation:null,
                auth:auth
            }
        },
        methods: {
            signout(){
                auth.signout()
            },
            register(event){
                event.preventDefault();
                auth.register(this, this.email, this.password,this.password_confirmation, this.name);
            }
        },
        mounted(){
            auth.check(false);
        }
    }
</script>