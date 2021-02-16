@extends('layouts.app')

@section('content')
  <div class="container">
      <h1>Api</h1>
    <input v-model="searchText" >
    <button @click="makeSearch">
      Search
    </button>
    <div class="genre">{{ $name }}</div>
    
    <div class="click" @click="takeGenre">take</div>
    <ul>
      <li v-for="element in listRestaurant">
          @{{element.name}}
      </li>
    </ul>
  </div>

@endsection
