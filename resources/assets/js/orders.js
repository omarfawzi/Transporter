import Vue from './app.js';
import {router} from './app.js';
export default {
    getSpecificOrder(context){
        context.error = false;
        Vue.http.get(
            'api/getSpecificOrder/'+context.orderID
        ).then(response => {
            context.customerName = response.data.order.name;
            context.mobileNumber = response.data.order.mobileNumber;
            context.sourceAddress = response.data.order.sourceAddress;
            context.destinationAddress = response.data.order.destinationAddress;
            context.orderCost = response.data.order.orderCost;
            context.deliveryCost = response.data.order.deliveryCost;
            context.sourceRegion = response.data.order.sourceRegion;
            context.destinationRegion = response.data.order.destinationRegion;
            context.size = response.data.order.size;
            context.customerMobileNumber = response.data.order.customerMobileNumber;
            context.description = response.data.order.description;
        }, response => {
            context.error = true;
        });
    },
    getOrders(context){
        context.error = false;
        Vue.http.get(
            'api/getOrders',
        ).then(response => {
            context.orders = response.data.orders;
        },response=>{
            context.error = true;
        });
    },
    placeOrder(order){
        order.success = false;
        order.error = false;
        Vue.http.post(
            'api/placeOrder',
            {
                name : order.customerName,
                sourceAddress:order.sourceAddress,
                destinationAddress:order.destinationAddress,
                mobileNumber:order.mobileNumber,
                orderCost:order.orderCost,
                deliveryCost:order.deliveryCost,
                sourceRegion:order.sourceRegion,
                destinationRegion:order.destinationRegion,
                size:order.size,
                customerMobileNumber:order.customerMobileNumber,
                description:order.description
            }
        ).then(response => {
            order.error = false;
            order.success = true;
        }, response => {
            order.error = true;
        });
    },
    cancelOrder(context){
        Vue.http.post(
            'api/cancelOrder/'+context.orderID
        ).then(response => {
           router.push({name:'orders'});
        }, response => {
            context.error = true;
        });
    },
    updateOrder(context){
        context.error = false;
        context.success = false;
        Vue.http.post(
            'api/updateOrder/'+context.orderID,{
                name : context.customerName,
                sourceAddress:context.sourceAddress,
                destinationAddress:context.destinationAddress,
                mobileNumber:context.mobileNumber,
                orderCost:context.orderCost,
                deliveryCost:context.deliveryCost,
                sourceRegion:context.sourceRegion,
                destinationRegion:context.destinationRegion,
                size:context.size,
                customerMobileNumber:context.customerMobileNumber,
                description:context.description
            }
        ).then(response => {
            context.success = true;
            context.error = false;
        }, response => {
            context.error = true;
        });
    }
    ,
    export(context){
        context.error = false;
        Vue.http.get(
            'api/exportOrders'
        ).then(response => {
            context.error = false;
        }, response => {
            context.error = true;
        });
    }
};