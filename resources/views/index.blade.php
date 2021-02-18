@extends('layouts.search')

@section('content')
<div id="search">
    <div class="container">
        <h1>ADVANCED RESEARCH</h1>
        <h3>You are inside all category</h3>
        <span class="genre"></span>
        <h3>search restaurant by name</h3>
        <input v-model="searchText" @keyup="makeSearch">
        <button @click="makeSearch">
            Search
        </button>
        
        {{-- <div class="click" @click="takeGenre">take</div> --}}
        <ul v-if="listRestaurant.length>0">
            <li v-for="element in listRestaurant">
                <a href="{{route('guest.RestaurantShow', @{{ element.slug }})}}">@{{element.name}} </a>
            </li>
        </ul>
        <h5 v-else>there are no results</h5>
    </div>

</div>




@endsection
