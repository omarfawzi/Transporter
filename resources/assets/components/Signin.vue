<template>
    <div class="wrapper">

        <nav class="navbar navbar-default">

            <div class="container-fluid">

                <div class="navbar-header">
                    <router-link :to="{ name: 'login'}" class="navbar-brand">Transporter</router-link>
                </div>
            </div>
        </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <div class="alert alert-danger" v-if="error">
                            <p>Invalid Credentials</p>
                        </div>
                        <form class="form-horizontal" role="form" v-on:submit="login">
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input v-model="email" id="email" type="email" placeholder="Email" class="form-control border-input" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input v-model="password" id="password" type="password" placeholder="Password" class="form-control border-input" name="password" required>
                                </div>
                            </div>
                            <!--<center>-->
                                <!--<div class="form-group">-->
                                    <!--<label>-->
                                        <!--<input type="checkbox" name="remember"> Remember Me-->
                                    <!--</label>-->
                                <!--</div>-->
                            <!--</center>-->
                            <div class="form-group">
                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-l btn-primary ">
                                            Login
                                        </button>
                                        <router-link :to="{ name: 'forgetPassword'}" class="btn btn-link">Forgot Your Password?</router-link>
                                        <!--<a class="btn btn-link">-->
                                            <!--Forgot Your Password?-->
                                        <!--</a>-->
                                    </center>
                                </div>
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
                email: null,
                password: null,
                error: false
            }
        },
        methods: {
            login(event) {
                event.preventDefault();
                auth.login(this, this.email, this.password);
            }
        },
        mounted(){
            auth.check(true);
        }
    }
</script>
