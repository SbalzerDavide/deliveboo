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
        <ul v-if="listRestaurant.length>0">
            <li v-for="element in listRestaurant">
                <a :href="element.route">@{{element.name}} </a>
            </li>
        </ul>
        <h5 v-else>there are no results</h5>
    </div>

</div>




@endsection
