@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>i tuoi piatti 2</h1>

        @if (session('dish-deleted'))
            <div class="alert alert-danger">
                Dish "{{session('dish-deleted')}}" has been deleted
            </div>
        @endif

        <a class="btn btn-success" href="{{route('admin.restaurants.create')}}">Create a new Dish</a>
        @foreach ($dishes as $dish)       
            <div class="menu">
                <table class="table table-hover table-condensed">
                    <tbody>
                        <tr>
                            <td style="width:40%">
                                <h5>{{ $dish->name }}</h5>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{route('admin.restaurants.show', $dish->slug)}}">Vedi piatto</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.restaurants.edit', $dish->slug)}}">Edit</a>
                            </td>
                            <td>
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
        @endforeach

        <a href="{{ route('admin.home') }}">torna alla dashboard</a>
        <div class="container">
        
    </div>

    
    
    

    </main>

   

@endsection
