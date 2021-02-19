import Vue from 'vue';
import axios from 'axios';
import { runInContext } from 'lodash';

const search = new Vue({
    el: '#search',
    data:{
        searchText: '',
        listRestaurant: [],
        listGenre: [],
        filterGenre: [],
        genre : '',
        url: "guest/restaurantShow/debitis-quibusdam"
    },
    created(){
        var url = window.location.href;
        var urlArray = url.split("/");
        this.genre = urlArray[urlArray.length - 1];
        console.log('js search');

        // axios genres
        axios.get('http://127.0.0.1:8000/api/Genre')
            .then(response => {
                // deafaukt situation
                console.log(response.data)
                this.listGenre = response.data;
                console.log('genres:');
                console.log(this.listGenre);
            })

            .catch(error => {
                console.log(error);
            });


        // axios
        axios.get('http://127.0.0.1:8000/api/Restaurant')
            .then(response => {
            // deafaukt situation
            console.log(response.data)
            this.listRestaurant = response.data;
            console.log('restaurants:');
            console.log(this.listRestaurant);

            this.listRestaurant = this.listRestaurant.map(element =>{
                return {
                    ...element,
                    route: this.url + element.slug
                }
            })

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
        },
        takeGenre(index){
            var actualGenre = this.listGenre[index].genre_name;
            console.log(actualGenre);
            if(!this.filterGenre.includes(actualGenre)){
                this.filterGenre.push(actualGenre);
            } else if(this.filterGenre.includes(actualGenre)){
                var a = this.filterGenre.indexOf(actualGenre);
                this.filterGenre.splice(a, 1);
            }
            console.log(this.filterGenre);
        },
        applyFilter(){
            axios.get('http://127.0.0.1:8000/api/Restaurant',{
                params:{
                    genre: this.filterGenre,
                }
            })
                .then(response => {
                // deafaukt situation
                console.log(response.data)
                this.listRestaurant = response.data;
                console.log('restaurants:');
                console.log(this.listRestaurant)
                console.log(this.listRestaurant[0].name)
                console.log(this.listRestaurant[0].genre_name)
                


                })
                .catch(error => {
                console.log(error);
                }
            );
    
        }

    }
})