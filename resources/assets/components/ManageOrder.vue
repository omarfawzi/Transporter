<template>
    <div class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="header">

                            <h4 class="title">Manage Order</h4>

                        </div>

                        <div class="content">

                            <div class="alert alert-danger" v-if="error && !success">
                                <p>Check Internet Connection</p>
                            </div>

                            <div class="alert alert-success" v-if="success">
                                <p>Order updated successfully</p>
                            </div>

                            <form role="form" v-on:submit="updateOrder">


                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Customer Name</label>

                                            <input type="text" v-model="customerName" class="form-control border-input"

                                                   placeholder="Customer Name" required>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Mobile Number</label>

                                            <input type="number" v-model="mobileNumber"
                                                   class="form-control border-input"

                                                   placeholder="Mobile Number" required>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Customer Mobile Number</label>

                                            <input type="number" v-model="customerMobileNumber"
                                                   class="form-control border-input"

                                                   placeholder="Customer Mobile Number" required>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Source Region</label>

                                            <input type="text" v-model="sourceRegion" class="form-control border-input"

                                                   placeholder="Source Region" required>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Source Address</label>

                                            <input type="text" v-model="sourceAddress" class="form-control border-input"

                                                   placeholder="Source Address" required>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Destination Region</label>

                                            <input type="text" v-model="destinationRegion"
                                                   class="form-control border-input"

                                                   placeholder="Destination Region" required>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Destination Address</label>

                                            <input type="text" v-model="destinationAddress"
                                                   class="form-control border-input"

                                                   placeholder="Destination Address" required>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Size (in kg)</label>

                                            <input type="number" v-model="size" class="form-control border-input"

                                                   placeholder="Size" required>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Order Cost</label>

                                            <input type="text" v-model="orderCost" class="form-control border-input"

                                                   placeholder="Order Cost" required>

                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Delivery Cost</label>

                                            <input type="text" v-model="deliveryCost" class="form-control border-input"

                                                   placeholder="Delivery Cost" required>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Delivery Man</label>

                                            <select class="form-control border-input" v-model="deliveryMan">
                                                <option class="form-control" v-for="item in deliveryMen"
                                                        v-bind:value="item.deliveryManID">
                                                    {{item.fName + ' ' + item.lName}}
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <label>Description</label>
                                            <textarea class="form-control border-input" v-model="description">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="text-center form-group">

                                    <button type="submit" class="btn btn-info btn-fill btn-wd">
                                        <i class="fa fa-edit"></i>
                                        Update
                                    </button>

                                    <a v-on:click="cancelOrder" class="btn btn-danger btn-fill">
                                        <i class="fa fa-trash"></i>
                                        Cancel Order
                                    </a>

                                </div>

                                <div class="clearfix"></div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</template>