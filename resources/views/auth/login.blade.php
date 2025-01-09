@extends('layouts.app')  
  
@section('content')  
<div class="container">  
    <div class="row justify-content-center">  
        <div class="col-md-6 col-lg-4">  
            <div class="card shadow-lg">  
                <div class="card-header text-center bg-primary text-white">  
                    <h4>{{ __('Login') }}</h4>  
                </div>  
  
                <div class="card-body">  
                    @if ($errors->any())  
                        <div class="alert alert-danger">  
                            <ul>  
                                @foreach ($errors->all() as $error)  
                                    <li>{{ $error }}</li>  
                                @endforeach  
                            </ul>  
                        </div>  
                    @endif  
  
                    <form method="POST" action="{{ route('login') }}">  
                        @csrf  
  
                        <!-- Input untuk Email -->  
                        <div class="mb-3">  
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>  
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>  
                            @error('email')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
  
                        <!-- Input untuk Password -->  
                        <div class="mb-3">  
                            <label for="password" class="form-label">{{ __('Password') }}</label>  
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">  
                            @error('password')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
  
                        <!-- Tombol Login -->  
                        <div class="d-grid gap-2">  
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>  
                        </div>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
@endsection  
