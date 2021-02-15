@extends('layouts.app')
  
@section('content')
    <main class="container">
        <h1>Edit a New Dish</h1>

        @if ($errors->any())
          <div class="alert alert-danger">
          <ul>
        @foreach ($errors->all() as $error)
          <li>
              {{$error}}
          </li>
        @endforeach
          </ul>
          </div>
        @endif

       <form action="{{ route('admin.restaurants.update', $dish->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Dish Name:</label>
                <input  class="form-control" type="text" name="name" id="name" value="{{ old('name', $dish->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Dish Content:</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $dish->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="ingredients">Dish ingredients:</label>
                <input  class="form-control" type="text" name="ingredients" id="ingredients" value="{{ old('ingredients', $dish->ingredients) }}">
            </div>

            <div class="form-group">
                <label for="price">Dish price:</label>
                <input  class="form-control" type="number" step="0.01"
                name="price" id="price" value="{{ old('price', $dish->price) }}">
            </div>

            <div class="form-group">
                <label for="visibility">Dish visibility:</label>
                  <select name="visibility" id="visibility">
                    <option value="0">
                      No
                    </option>
                    <option selected value="1">
                      Yes
                    </option>
                  </select>
            </div>


            @isset($dish->path_image)
                <div class="wrap-image">
                    <img width="350px" src="{{asset('storage/' . $dish->path_image )}}" alt="{{$dish->name}}">
                </div>
                <h6>
                    Change:
                </h6>
            @endisset

            <div class="form-group">
                <label for="path_image">Dish image:</label>
                <input  class="form-control" type="file" name="path_image" id="path_image"  accept="image/*">
            </div>



            <input type="submit" class="btn btn-primary" value="Create Dish">

        </form>
   </main>
@endsection