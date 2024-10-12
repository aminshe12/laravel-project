@extends('layouts.layoutLogin')

@section('content')
    <div class="splash-container">
        @include('partials.alert')
        <div class="card">
            <div class="card-header text-center">
{{--                <img src="{{ asset('') }}" alt="LoGo Tech" style="width: 200px; height: 90px; margin-bottom: 20px">--}}
                <span class="splash-description">Please enter your user information</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                               id="email" placeholder="Email"
                               autocomplete="off" value="{{ old('email') }}" required>

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                               id="password" name="password"
                               placeholder="Password" required>

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
