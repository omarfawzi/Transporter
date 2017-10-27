import Vue from './app.js';
import {router} from './app.js';
export default {
  getDeliveryMen(context){
      context.error = false;
      Vue.http.get(
          'api/getDeliveryMen'
      ).then(response => {
          console.log(response.data.deliveryMen);
         context.deliveryMen = response.data.deliveryMen;
      }, response => {
          context.error = true;
      });
  }
};