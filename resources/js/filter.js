require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';
require('./bootstrap');


const search = new Vue({
    el: '#search',
    data:{
        searchText: '',
        listRestaurant: [],
        showedRestaurant: [],
        allRestaurant: [],
        genre : '',
        arrayGenre: [],
        baseUrl: '',
        load: false,
        numberRestaurant: 10,
        removedRestaurant: 0,
        buttonShow: true,
    },
    created(){
        //take genre from url
        var url = window.location.href;
        var urlArray = url.split("/");
        this.genre = urlArray[urlArray.length - 1];

        //take correct url for redirect page
        urlArray.splice(urlArray.length -2,2);
        var string = urlArray.toString();
        this.baseUrl = string.replace(/,/g, "/");

        // axios
        axios.get(this.baseUrl + '/api/Restaurant',{
            params:{
                genre: [this.genre],
            }
        })
            .then(response => {
                console.log(response.data);
                this.listRestaurant = response.data;

                //add baseUrl to avery element
                this.listRestaurant = this.listRestaurant.map(element =>{
                    return {
                        ...element,
                        route:this.baseUrl + '/guest/restaurantShow/' + element.slug
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
            }
        );
    },
    methods:{
        makeSearch(){
            this.numberRestaurant = 10;
            this.buttonShow = true;
            console.log(this.searchText);
            console.log(this.genre);
            this.arrayGenre = [this.genre];
            if (this.searchText.trim() != ''){
                axios.get(this.baseUrl + '/api/Restaurant',{
                    params:{
                        name: this.searchText,
                        genre: this.arrayGenre,
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
                        this.load = true;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            } else {
                // axios restaurant
                axios.get(this.baseUrl + '/api/Restaurant',{
                    params:{
                        genre: [this.genre],
                    }
                })
                    .then(response => {
                        console.log(response.data);
                        this.listRestaurant = response.data;
        
                        //add baseUrl to avery element
                        this.listRestaurant = this.listRestaurant.map(element =>{
                            return {
                                ...element,
                                route:this.baseUrl + '/guest/restaurantShow/' + element.slug
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
                    }
                );
                        
            }
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