import Vue from 'vue';
import axios from 'axios';
import { runInContext } from 'lodash';

const search = new Vue({
    el: '#search',
    data:{
        searchText: '',
        listRestaurant: [],
        genre : '',
        url: "guest/restaurantShow/debitis-quibusdam"
    },
    created(){
        var url = window.location.href;
        var urlArray = url.split("/");
        this.genre = urlArray[urlArray.length - 1];
        console.log('js search');

        // axios
        axios.get('http://127.0.0.1:8000/api/Restaurant')
            .then(response => {
            // deafaukt situation
            console.log(response.data)
            this.listRestaurant = response.data;
            console.log('restaurants:');
            console.log(this.listRestaurant);

            
            
                
            })

            .catch(error => {
            console.log(error);
            });
    },
    methods:{
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
                
                    
                });
            }

        

    }
})