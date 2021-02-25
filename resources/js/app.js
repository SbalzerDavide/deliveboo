require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';

const app = new Vue({
    el: '#app',
    data:{

        searchText: '',
        listRestaurant: [],
        genreSearch: '',
        quantity: 12,
       /*  datiUrl:window.location.hostname + ':8000/api/', */



    },

    created(){
        // axios.get('http://127.0.0.1:8000/api/Restaurant')
                
        //       .then(response => {
        //         // deafaukt situation
        //         console.log(response.data)
        //         this.listRestaurant = response.data;
        //         console.log(this.listRestaurant)
               
                 
        //        })
   
        //       .catch(error => {
        //        console.log(error);
        //       });
        
    },

    methods:{
        takeGenre(){
            // console.log('ciao');
            // var url = window.location.href;
            // console.log(window.location.href);
            // var urlArray = url.split("/");
            // console.log(urlArray);
            // var genre = urlArray[urlArray.length - 1];
            // console.log(genre);
            // // console.log($genre);

            // // axios
            // axios.get('http://127.0.0.1:8000/api/Restaurant',{
            //     params:{
            //         genre: genre,
            //     }
            // }   
            // )
            //       .then(response => {
            //         // deafaukt situation
            //         console.log(response.data)
            //         this.listRestaurant = response.data;
            //         console.log(this.listRestaurant)
                   
                     
            //        })
       
            //       .catch(error => {
            //        console.log(error);
            //       });
            
    
        },
        changeQuantity(element){
            axios.post('http://127.0.0.1:8000/guest/change/', {
                firstName: 'Fred',
                lastName: 'Flintstone'
              })
              .then(function (response) {
                console.log(response);
              })
              .catch(function (error) {
                console.log(error);
              });
            console.log(element);
        },
        makeSearch(){
            /*  console.log(this.datiUrl) */
            axios.get('http://127.0.0.1:8000/api/Restaurant',{
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
