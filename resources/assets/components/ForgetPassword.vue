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
                    <div class="panel-heading">Reset Password</div>

                    <div class="panel-body">
                        <div class="alert alert-danger" v-if="error">
                            <p>Email don't exists</p>
                        </div>
                        <div class="alert alert-danger" v-if="networkError">
                            <p>Check Internet Connection</p>
                        </div>
                        <form class="form-horizontal" v-on:submit="resetPassword">

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control border-input" v-model="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
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
                error: false,
                networkError:false
            }
        },
        methods: {
            resetPassword(){
                auth.resetPassword(this);
            }
        },
        mounted(){
            auth.check(true,'forgetPassword');
        }
    }
</script>