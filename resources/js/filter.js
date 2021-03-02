import Vue from 'vue';
import axios from 'axios';


const search = new Vue({
    el: '#search',
    data:{
        searchText: '',
        listRestaurant: [],
        showedRestaurant: [],
        allRestaurant: [],

        genre : '',
        baseUrl: '',
        load: false,
        numberRestaurant: 1,
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

        console.log(this.load);

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
            console.log(this.removedRestaurant);
            this.listRestaurant.splice(this.numberRestaurant, this.removedRestaurant);
            console.log('filtered');
            console.log(this.listRestaurant);

            this.showedRestaurant = this.listRestaurant;

            this.load = true;

            })
            .catch(error => {
            console.log(error);
            }
        );
    },
    mounted() {
        // window.addEventListener('load', () => {
        //     this.load = true;
        //     console.log(this.load);
        // })
    },
    methods:{
        makeSearch(){
            this.buttonShow = true;
            if (this.searchText != ''){
                axios.get(this.baseUrl + '/api/Restaurant',{
                    params:{
                        name: this.searchText,
                        genre: this.genre,
                    }
                })
                    .then(response => {
                        console.log(this.genre);
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
            }
        },
        moreRestaurants(){
            console.log(this.numberRestaurant);
            this.numberRestaurant = this.numberRestaurant + 1;
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