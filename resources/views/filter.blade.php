@extends('layouts.filter')

@section('content')
<div id="search">
    <div class="container ">
        <h1>ADVANCED RESEARCH</h1>
        <h3>You are inside "{{ $name }}" category</h3>
        <span class="genre"></span>
        <h3>search restaurant by name</h3>
        <input v-model="searchText" @keyup.enter="makeSearch">
        <button @click="makeSearch">
            Search
        </button>
        
        {{-- <div class="click" @click="takeGenre">take</div> --}}
        <div class="container-restaurant-genres">
            <div v-if="listRestaurant.length>0" class="restaurant-container">
                <ul >
                    <a id="no-decoration" v-for="element in listRestaurant" :href="element.route">
                        <li >
                            <img :src="'http://127.0.0.1:8000/storage/' + element.path_image" width="100%" alt="">
                            <div class="rest-text">
                                <h5>@{{element.name}}</h5> 
                            </div>
                        </li>
                    </a>
                </ul>
            </div>
            <h5 v-else>there are no results</h5>
        </div>
    </div>

</div>




@endsection
