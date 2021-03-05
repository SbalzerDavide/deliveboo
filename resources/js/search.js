require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';
require('./bootstrap');
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
                
                //add baseUrl to avery element
                this.listRestaurant = this.listRestaurant.map(element =>{
                    return {
                        ...element,
                        route: this.url + element.slug
                    }
                })
                this.allRestaurant = [...this.listRestaurant];
                this.removedRestaurant = this.listRestaurant.length - this.numberRestaurant;
                this.listRestaurant.splice(this.numberRestaurant, this.removedRestaurant);
                this.showedRestaurant = this.listRestaurant;
                this.load = true;
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods:{
        makeSearch(){
            this.numberRestaurant = 10;
            this.buttonShow = true;
            if (this.searchText.trim() != ''){
                axios.get(this.baseUrl + '/api/Restaurant',{
                    params:{
                        name: this.searchText,
                        genre: this.filterGenre,
                    }
                })
                    .then(response => {
                        this.listRestaurant = response.data;
                        
                        //add baseUrl to avery element
                        this.listRestaurant = this.listRestaurant.map(element =>{
                            return {
                                ...element,
                                route: this.url + element.slug
                            }
                        })
                        this.allRestaurant = [...this.listRestaurant];
                        this.removedRestaurant = this.listRestaurant.length - this.numberRestaurant;
                        this.listRestaurant.splice(this.numberRestaurant, this.removedRestaurant);
                        this.showedRestaurant = this.listRestaurant;

                        //hide button
                        if(this.numberRestaurant >= this.allRestaurant.length){
                            this.buttonShow = false;
                            console.log('condizione if');
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            } else {
                // axios restaurant
                axios.get(this.baseUrl + '/api/Restaurant',{
                    params:{
                        genre: this.filterGenre,
                    }
                })
                    .then(response => {
                        console.log(response.data)
                        this.listRestaurant = response.data;
    
                        //add baseUrl to avery element
                        this.listRestaurant = this.listRestaurant.map(element =>{
                            return {
                                ...element,
                                route: this.url + element.slug
                                }
                            })
                        this.allRestaurant = [...this.listRestaurant];
                        this.removedRestaurant = this.listRestaurant.length - this.numberRestaurant;
                        this.listRestaurant.splice(this.numberRestaurant, this.removedRestaurant);
                        this.showedRestaurant = this.listRestaurant;
                        
                        //hide button
                        if(this.numberRestaurant >= this.allRestaurant.length){
                            this.buttonShow = false;
                            console.log('condizione if');
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    }
                );
    
            }
        },
        takeGenre(index){
            var actualGenre = this.listGenre[index].genre_name;
            if(!this.filterGenre.includes(actualGenre)){
                this.filterGenre.push(actualGenre);
            } else if(this.filterGenre.includes(actualGenre)){
                var a = this.filterGenre.indexOf(actualGenre);
                this.filterGenre.splice(a, 1);
            }
        },
        applyFilter(){
            this.numberRestaurant = 10;
            this.buttonShow = true;

            axios.get(this.baseUrl + '/api/Restaurant',{
                params:{
                    genre: this.filterGenre,
                }
            })
                .then(response => {
                    console.log(response.data)
                    this.listRestaurant = response.data;

                    //add baseUrl to avery element
                    this.listRestaurant = this.listRestaurant.map(element =>{
                        return {
                            ...element,
                            route: this.url + element.slug
                            }
                        })
                    this.allRestaurant = [...this.listRestaurant];
                    this.removedRestaurant = this.listRestaurant.length - this.numberRestaurant;
                    this.listRestaurant.splice(this.numberRestaurant, this.removedRestaurant);
                    this.showedRestaurant = this.listRestaurant;
                    
                    //hide button
                    if(this.numberRestaurant >= this.allRestaurant.length){
                        this.buttonShow = false;
                        console.log('condizione if');
                    }
                })
                .catch(error => {
                    console.log(error);
                }
            );
        },
        moreRestaurants(){
            this.numberRestaurant = this.numberRestaurant + 10;
            this.listRestaurant = [...this.allRestaurant];
            this.listRestaurant.splice(this.numberRestaurant, 100);
            this.showedRestaurant = this.listRestaurant;
            
            //hide button
            if(this.numberRestaurant >= this.allRestaurant.length){
                this.buttonShow = false;
                console.log('condizione if');
            }
        }
    }
})