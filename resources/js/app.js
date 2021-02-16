require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';

const app = new Vue({
    el: '#app',
    data:{

        searchText: '',
        listRestaurant: [],
       /*  datiUrl:window.location.hostname + ':8000/api/', */



    },

    created(){
       /*  console.log(this.datiUrl) */
        axios.get('api/Restaurant')
                
              .then(response => {
                // deafaukt situation
                console.log(response.data)
                this.listRestaurant = response.data;
                console.log(this.listRestaurant)
               
                 
               })
   
              .catch(error => {
               console.log(error);
              });
    },

    methods:{

        makeSearch(){
            axios.get("http://127.0.0.1:8000/api/Restaurant")
                
            .then(response => {
              // deafaukt situation
              console.log(response.data)
              this.listRestaurant = response.data;
              console.log(this.listRestaurant)

             
               
             })
 
            .catch(error => {
             console.log(error);
            });
        }

    }

});
