import Vue from 'vue';
import axios from 'axios';
import { runInContext } from 'lodash';

const search = new Vue({
    el: '#search',
    data:{
        searchText: '',
        listRestaurant: [],
        showedRestaurant: [],
        allRestaurant: [],
        listGenre: [],
        filterGenre: [],
        genre : '',
        url: 'guest/restaurantShow/',
        baseUrl: '',
        load: false,
        numberRestaurant: 10,
        removedRestaurant: 0,
        buttonShow: true,


    },
    created(){
        var url = window.location.href;
        var urlArray = url.split("/");
        this.genre = urlArray[urlArray.length - 1];

        //take correct url for redirect page
        urlArray.splice(urlArray.length -1,1);
        var string = urlArray.toString();
        this.baseUrl = string.replace(/,/g, "/");

        // axios genres
        axios.get(this.baseUrl + '/api/Genre')
            .then(response => {
                console.log(response.data)
                this.listGenre = response.data;
            })
            .catch(error => {
                console.log(error);
            });

        // axios restaurant
        axios.get(this.baseUrl + '/api/Restaurant')
            .then(response => {
                console.log(response.data)
                this.listRestaurant = response.data;


                //intermedio
                // this.intermedio = response.data;

                
                
                
                //add baseUrl to avery element
                this.listRestaurant = this.listRestaurant.map(element =>{
                    return {
                        ...element,
                        route: this.url + element.slug
                    }
                })
                this.allRestaurant = [...this.listRestaurant];
                this.removedRestaurant = this.listRestaurant.length - this.numberRestaurant;
                console.log(this.removedRestaurant);
                this.listRestaurant.splice(this.numberRestaurant, this.removedRestaurant);
                console.log('filtered');
                console.log(this.listRestaurant);

                this.showedRestaurant = this.listRestaurant;
                
            this.load = true;
            })
            .catch(error => {
            console.log(error);
            });
    },
    mounted() {
        // window.addEventListener('load', () => {
        //     this.load = true;
        //     console.log(this.load);
        // })
    },
    methods:{
        makeSearch(){
            if (this.searchText != ''){
                axios.get(this.baseUrl + '/api/Restaurant',{
                    params:{
                        name: this.searchText,
                    }
                })
                    .then(response => {
                        // deafaukt situation

                        this.listRestaurant = response.data;


                        //intermedio
                        // this.intermedio = response.data;
        
                        
                        
                        
                        //add baseUrl to avery element
                        this.listRestaurant = this.listRestaurant.map(element =>{
                            return {
                                ...element,
                                route: this.url + element.slug
                            }
                        })
                        this.allRestaurant = [...this.listRestaurant];
                        this.removedRestaurant = this.listRestaurant.length - this.numberRestaurant;
                        console.log(this.removedRestaurant);
                        this.listRestaurant.splice(this.numberRestaurant, this.removedRestaurant);
                        console.log('filtered');
                        console.log(this.listRestaurant);
        
                        this.showedRestaurant = this.listRestaurant;
                        
        
                        // console.log(response.data)
                        // this.listRestaurant = response.data;
                        // //add baseUrl to avery element
                        // this.listRestaurant = this.listRestaurant.map(element =>{
                        //     return {
                        //         ...element,
                        //         route: this.url + element.slug
                        //     }
                        // })
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
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
        },
        applyFilter(){
            axios.get(this.baseUrl + '/api/Restaurant',{
                params:{
                    genre: this.filterGenre,
                }
            })
                .then(response => {
                // deafaukt situation
                console.log(response.data)
                this.listRestaurant = response.data;
                //add baseUrl to avery element
                this.listRestaurant = this.listRestaurant.map(element =>{
                    return {
                        ...element,
                        route: this.url + element.slug
                        }
                    })
                })
                .catch(error => {
                console.log(error);
                }
            );
        },
        moreRestaurants(){
            console.log(this.numberRestaurant);
            this.numberRestaurant = this.numberRestaurant + 10;
            console.log('number');
            console.log(this.numberRestaurant);

            // this.removedRestaurant = this.showedRestaurant.length - this.numberRestaurant;
            // console.log('removed');

            console.log(this.removedRestaurant);
            console.log(this.allRestaurant);

            this.listRestaurant = [...this.allRestaurant];
            console.log(this.listRestaurant);

            this.listRestaurant.splice(this.numberRestaurant, 100);
            console.log('filtered');
            console.log(this.listRestaurant);

            this.showedRestaurant = this.listRestaurant;
            console.log('...........');
            console.log(this.numberRestaurant);
            console.log(this.allRestaurant.length);
            console.log(this.buttonShow);


            if(this.numberRestaurant >= this.allRestaurant.length){
                this.buttonShow = false;
                console.log('condizione if');
            }

            console.log(this.buttonShow);
        }

    }
})