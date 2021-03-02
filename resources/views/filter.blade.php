@extends('layouts.filter')

@section('content')
<div>
    <div class="hero-rest">
        <div class="container">
            <div class="box">
              <h3>ADVANCED RESEARCH <br> You are inside genre {{$name}}</h3>
              <input class="input-primary" v-model="searchText"  placeholder="search restaurant by name" @keyup.enter="makeSearch">
              <div class="btn-list large" @click="makeSearch">
                  <i class="fas fa-arrow-right"></i>
              </div>
            </div>
        </div> 
    </div>
    <div class="container">
        <div class="container-restaurant-genres">
            <div v-if="listRestaurant.length>0" class="restaurant-container">
                <ul>
                    <a id="no-decoration" v-for="element in listRestaurant" :href="element.route">
                        <li class="rest-box">
                            <img class="zoom-in" :src="'http://127.0.0.1:8000/storage/' + element.path_image" width="100%" alt="">
                            <div class="rest-text">
                                <h5>@{{element.name}}</h5> 
                            </div>
                        </li>
                    </a>
                </ul>
            </div>
            <h5 v-else>there are no results</h5>
        </div>
        <div v-if="buttonShow"  class="btn-list mt-5 mb-5" @click="moreRestaurants">
          show more results
        </div>
    </div>
</div>
@endsection
