require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';

const app = new Vue({
    el: '#app',
    data:{

        searchText: '',
        listRestaurant: [],
        genreSearch: '',
       /*  datiUrl:window.location.hostname + ':8000/api/', */



    },

    created(){
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
        takeGenre(){
            // console.log('ciao');
            var url = window.location.href;
            console.log(window.location.href);
            var urlArray = url.split("/");
            console.log(urlArray);
            var genre = urlArray[urlArray.length - 1];
            console.log(genre);
            // console.log($genre);
        },
        makeSearch(){
            /*  console.log(this.datiUrl) */
        axios.get('api/Restaurant',{
            params:{
                name: this.searchText,
            }
        }   
        )
                
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
