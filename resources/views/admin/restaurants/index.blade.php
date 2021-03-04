@extends('layouts.app')

@section('content')
    <main class="container">
        <div class="top-side">
            <h1>Your dishes</h1>
    
            @if (session('dish-deleted'))
                <div class="alert alert-danger">
                    Dish "{{session('dish-deleted')}}" has been deleted
                </div>
            @endif
    
            <a class="btn-list" href="{{route('admin.restaurants.create')}}">Create a new Dish  </a>
        </div>
        @foreach ($dishes as $dish)       
            <div class="menu">
                <table class="table table-hover table-condensed table-compressed">
                    <tbody>
                        <tr>
                            <td data-th="image" style="width:10%">
                                <div class="row">
                                    <div class="col-sm-9 ">
                                        <img width="80" src="{{asset('storage/' . $dish['path_image'])}}" alt="">
                                    </div>
                                </div>
                            </td>
                            <td style="width:40%">
                                <h5>{{ $dish->name }}</h5>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{route('admin.restaurants.show', $dish->slug)}}">Show dish</a>
                            </td>
                            <td style="width:16,5%">
                                <a class="btn btn-primary" href="{{route('admin.restaurants.edit', $dish->slug)}}">Edit</a>
                            </td>
                            <td style="width:16,5%">
                                <form action="{{route('admin.restaurants.destroy', $dish->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
    
                    </tbody>
                </table>
            </div>

            <div class="dish-index">
                <div class="cart-box">
                    @if ($dish['path_image'])
                        <img src="{{asset('storage/' . $dish['path_image'])}}" alt="">
                    @else
                        <img src="{{asset('image/default_dish.jpg')}}" alt="default_image">
                    @endif
                    
                    <h5>{{ $dish->name }}</h5>
                    <div>
                        <a class="btn btn-success" href="{{route('admin.restaurants.show', $dish->slug)}}">Vedi piatto</a>
                    </div>
                   
                    <a class="btn btn-primary" href="{{route('admin.restaurants.edit', $dish->slug)}}">Edit</a>

                    <form action="{{route('admin.restaurants.destroy', $dish->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </div>
            </div>
        @endforeach

        <div class="back-home">
            <a class="compra-inverso" href="{{ route('admin.home') }}"> <span> <i class="fas fa-arrow-left"></i>  torna alla dashboard</span></a>
        </div>
        <div class="container">
        
        </div>

    
    
    

    </main>

   

@endsection
