<template>
    <div class="content" >

        <div class="container-fluid" >
            <div class="alert alert-danger" v-if="error">
                <p>Check Internet Connection</p>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="header">

                            <div class="col-md-3">

                                <h4 class="title">Delivery Men</h4>

                                <p class="category">Delivery Men</p>

                            </div>

                        </div>

                        <div class="content table-responsive table-full-width">

                            <table class="table table-striped">

                                <thead>

                                <th>Order ID</th>

                                <th>Status</th>

                                <th>Money</th>

                                </thead>

                                <tbody>

                                <tr v-for="order in orders">

                                    <td></td>

                                    <td></td>

                                    <td></td>

                                    <!--<td>-->
                                    <!--<router-link :to="{ path:'/home/manageOrder/'+order.orderID}" class="btn btn-primary btn-fill">-->
                                    <!--<i class="fa fa-edit"></i>-->
                                    <!--Manage-->
                                    <!--</router-link>-->
                                    <!--</td>-->

                                </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>
</template>
<script>
    import money from '../js/money.js';
    export default{
        data(){
            return {
                orders : [],
                error:false
            }
        }
        ,
        mounted(){

        }
    }
</script>