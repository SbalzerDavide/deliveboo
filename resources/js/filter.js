import Vue from 'vue';
import axios from 'axios';

const search = new Vue({
    el: '#search',
    data:{
        searchText: '',
        listRestaurant: [],
        genre : '',
        baseUrl: '',
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
            })
            .catch(error => {
            console.log(error);
            }
        );
    },
    methods:{
        makeSearch(){
            if (this.searchText != ''){
                axios.get(this.baseUrl + '/api/Restaurant',{
                    params:{
                        name: this.searchText,
                        genre: this.genre,
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
                    })
                    .catch(error => {
                    console.log(error);
                    });
            }
        }
    }
})