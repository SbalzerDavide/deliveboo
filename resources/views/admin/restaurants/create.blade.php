@extends('layouts.app')
  
@section('content')
   <main class="container">
       <h1>Create a New Dish</h1>

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
      

       <form action="{{ route('admin.restaurants.store') }}" method="POST"  enctype="multipart/form-data">

            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Dish Name: *</label>
                <input  class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Description: *</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="ingredients">Dish ingredients: *</label>
                <input  class="form-control" type="text" name="ingredients" id="ingredients" value="{{ old('ingredients') }}">
            </div>

            <div class="form-group">
                <label for="price">Dish price: *</label>
                <input  class="form-control" type="number" step="0.01"
                name="price" id="price" value="{{ old('price') }}">
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

            <div class="form-group">
                <label for="path_image">Dish image:</label>
                <input  class="form-control" type="file" name="path_image" id="path_image"  accept="image/*">
            </div>



            <input type="submit" class="btn btn-primary" value="Create Dish">

        </form>
   </main>
@endsection