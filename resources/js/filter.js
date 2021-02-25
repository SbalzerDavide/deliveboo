import Vue from 'vue';
import axios from 'axios';

const search = new Vue({
    el: '#search',
    data:{
        searchText: '',
        listRestaurant: [],
        genre : '',
        url: '',

    },
    created(){
        var url = window.location.href;
        var urlArray = url.split("/");
        this.genre = urlArray[urlArray.length - 1];
        console.log('work');
        var asd = ['burger', 'dessert'];
        // axios
        axios.get('http://127.0.0.1:8000/api/Restaurant',{
            params:{
                // genre: this.genre,
                genre: [this.genre],
                //make research with more than one value of genre
                // use genre in a array of genres
                // categoryId: [1, 2, 3]
            }
        })
            .then(response => {
            // deafaukt situation
            this.url = window.location.href;
            var urlArray = url.split("/");
            urlArray.splice(urlArray.length -2,2);
            var string = urlArray.toString();
            var correct = string.replace(/,/g, "/");
            console.log(response.data);
            console.log(this.url);
            console.log(urlArray);
            console.log(string);
            console.log(correct);
            
            this.listRestaurant = response.data;
            this.listRestaurant = this.listRestaurant.map(element =>{
                return {
                    ...element,
                    route:correct + '/guest/restaurantShow/' + element.slug
                    }
                })

            console.log('restaurants:');
            console.log(this.listRestaurant)
            })
            .catch(error => {
            console.log(error);
            }
        );
    },
    methods:{
        makeSearch(){
            /*  console.log(this.datiUrl) */
            axios.get('http://127.0.0.1:8000/api/Restaurant',{
                params:{
                    name: this.searchText,
                    genre: this.genre,
                }
            }   
            )
                    
                .then(response => {
                    // deafaukt situation
                    console.log(response.data)
                    this.listRestaurant = response.data;
                    console.log(this.listRestaurant);
                    this.listRestaurant = this.listRestaurant.map(element =>{
                        return {
                            ...element,
                            route: this.url + element.slug
                            }
                        })
        
                
                    
                })
    
                .catch(error => {
                console.log(error);
                });
            }

        

    }
})