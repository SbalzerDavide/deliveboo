@extends('layouts.search')

@section('content')
<div>
    <div class="hero-rest">
        <div class="container">
            <div class="box">
                <h3>Discovery the Best Food in the city</h3>
            
                <input class="input-primary" v-model="searchText" placeholder="search restaurant by name" @keyup.enter="makeSearch">
                <div class="btn-list large" @click="makeSearch">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        
        
        {{-- <div class="click" @click="takeGenre">take</div> --}}
        
        <div class="container-restaurant-genres">
            <div class="form-check">
                <div class="check" v-for="(genre , index) in listGenre" >
                    <input  class="form-check-input" type="checkbox" :value="genre.genre_name" @click="takeGenre(index)">
                    <label class="form-check-label">@{{ genre.genre_name }}</label>
                </div>
                <div class="btn-list" @click="applyFilter">search</div>
            </div>
            <div v-if="listRestaurant.length>0" class="restaurant-container">
                <ul >
                    <a id="no-decoration" v-for="element in showedRestaurant" :href="element.route">
                        <li class="rest-box">
                            <img :src="'http://127.0.0.1:8000/storage/' + element.path_image" width="100%" alt="">
                            <div class="rest-text">
                                <h5>@{{element.name}}</h5> 
                            </div>
                        </li>
                    </a>
                </ul>
                {{-- <a href="#bottom" id="bottom" class="btn btn-primary" @click="moreRestaurants">show more restaurants</a> --}}
                <div class="btn btn-primary" @click="moreRestaurants">
                    {{-- <a href="#bottom">show more results</a> --}}
                    show more results
                </div>
            </div>

            <h5 v-else>there are no results</h5>
        </div>

       
</div>




@endsection
