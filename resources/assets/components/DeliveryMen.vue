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

                            <div class="col-md-5">

                                <div class="input-group">

                                    <span class="input-group-addon" style="background-color: gainsboro"><i class="fa fa-search fa-fw"></i></span>

                                    <input id="myInput" v-on:keyup="check" type="text" name="searchInfo" class="form-control border-input" placeholder="Search..." autocomplete="on">

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <select v-on:change="check" class="form-control border-input" id="searchBy">

                                        <option hidden>Search By ( Default : Name )</option>

                                        <option name="searchInputs" class="form-control">Name</option>

                                        <option name="searchInputs" class="form-control">Mobile Number</option>

                                        <option name="searchInputs" class="form-control">Email</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="content table-responsive table-full-width">

                            <table id="searchTable" class="table table-striped" style="display: none;">

                                <thead>

                                <th>Name</th>

                                <th>Mobile Number</th>

                                <th>Email</th>

                                </thead>

                                <tbody>

                                <tr v-for="deliveryMan in deliveryMen">

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

                            <table id="myTable" class="table table-striped">

                                <thead>

                                <th>Name</th>

                                <th>Mobile Number</th>

                                <th>Email</th>

                                </thead>

                                <tbody>

                                <tr v-for="deliveryMan in deliveryMen">

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
    import deliveryMen from '../js/deliveryMen.js';
    export default {
        data() {
            return {
                deliveryMen:[],
                error:false
            }
        },
        mounted(){
            deliveryMen.getDeliveryMen(this);
        },
        methods: {
            myFunction(){
                var input, filter, table, tr, td, i,idx = 0;

                var searchBy = document.getElementById("searchBy").value;

                var searchInputs = document.getElementsByName("searchInputs");
                for (var j = 0 ; j < searchInputs.length ; j++) {

                    if(searchInputs[j].value == searchBy){
                        idx = j;

                        break;

                    }

                }

                input = document.getElementById("myInput");

                filter = input.value.toLowerCase();

                table = document.getElementById("searchTable");

                table.style.display = "";

                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {

                    td = tr[i].getElementsByTagName("td")[idx];

                    if (td) {

                        if (td.innerHTML.replace(/\s+/g, '').toLowerCase().indexOf(filter) > -1 || td.innerHTML.toLowerCase().indexOf(filter) > -1) {

                            tr[i].style.display = "";

                        } else {

                            tr[i].style.display = "none";

                        }

                    }

                }
            },
            check(){
                var input = document.getElementById("myInput").value;

                var table , tr , i;

                if (input != "") {

                    table = document.getElementById("myTable");

                    table.style.display = "none";

                    this.myFunction();

                }

                else{

                    table = document.getElementById("searchTable");

                    tr = table.getElementsByTagName("tr");

                    table.style.display="none";

                    table = document.getElementById("myTable");

                    table.style.display="";

                }
            }
        }
    }
</script>