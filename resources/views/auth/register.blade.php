@extends('layouts.app')

@section('content')
<div class="container form">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                                    
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}*</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- pIva --}}
                        <div class="form-group row">
                            <label for="PIva" class="col-md-4 col-form-label text-md-right">{{ __('PIva') }}*</label>

                            <div class="col-md-6">
                                <input id="PIva" type="text" class="form-control @error('PIva') is-invalid @enderror" name="PIva" value="{{ old('PIva') }}" required autocomplete="PIva" autofocus>

                                @error('PIva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        {{-- checkbox with genres --}}
                        <h5>Select the genres of your restaurant </h5>
                        <div class="form-group check">
                            @foreach ($genres as $genre)
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="genres[]" id="genre-{{ $genre->id }}" value="{{ $genre->id }}">
                                <label class="form-check-label" for="genre-{{ $genre->id }}">{{ $genre->genre_name }}</label>
                            </div>
                           @endforeach
                        </div>
                         
                        <hr>

                        {{-- image --}}
                        <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right" for="path_image">Restaurant image:</label>
                             <div class="col-md-6">

                                 <input  class="form-control" type="file" name="path_image" id="path_image"  accept="image/*">
                             </div>
                        </div>

                        <hr>                        

                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn-list">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
