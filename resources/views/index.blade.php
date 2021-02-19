@extends('layouts.search')

@section('content')
<div id="search">
    <div class="container">
        <h1>ADVANCED RESEARCH</h1>
        <h3>You are looking for inside all category</h3>
        <span class="genre"></span>
        <h3>search restaurant by name</h3>
        <input v-model="searchText" @keyup="makeSearch">
        <button @click="makeSearch">
            Search
        </button>
        
        {{-- <div class="click" @click="takeGenre">take</div> --}}
        <ul v-if="listRestaurant.length>0">
            <li v-for="element in listRestaurant">
                <a :href="element.route">@{{element.name}} </a>
            </li>
        </ul>
        <h5 v-else>there are no results</h5>
    </div>
    <hr>

    <div class="form-check container">
        <div class="check" v-for="(genre , index) in listGenre" >
            <input  class="form-check-input" type="checkbox" :value="genre.genre_name" @click="takeGenre(index)">
            <label class="form-check-label">@{{ genre.genre_name }}</label>
        </div>
        <div class="btn btn-primary" @click="applyFilter">filter by genres</div>
    </div>
</div>




@endsection
