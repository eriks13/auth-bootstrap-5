@extends('layout.auth')

@section('content')
<div class="mb-4">
  <div class="d-flex justify-content-center mb-4">
    <div class="col-auto">
      <h5 class="fs-ui">{{ __('Register Form') }}</h5>
    </div>
  </div>
 </div>
  <form action="{{ route('register') }}" method="POST" class="row g-3 justify-content-center">
    @csrf
    <div class="col-lg-6">
      <div class="card py- px-4">
        <div class="card-body">
          <div class="col-md-12">
            <label for="name" class="form-label fs-ui">{{ __('Name') }}</label>
            <input type="text" class="form-control form-control-md @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="username">
           @error('name')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
           @enderror
          </div>
          <div class="col-md-12">
            <label for="email" class="form-label fs-ui">{{ __('Email') }}</label>
            <input type="email" class="form-control form-control-md @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" required autocomplete="email">
            @error('email')
            <div class="invalid-feedback">
             {{ $message }}
            </div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="password" class="form-label fs-ui">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control form-control-md @error('password') is-invalid @enderror" id="password" required>
            @error('password')
            <div class="invalid-feedback">
             {{ $message }}
            </div>
            @enderror
          </div>
          <div class="col-md-12 mb-3">
            <label for="password_confirmation" class="form-label fs-ui">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" class="form-control form-control-md @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
            @error('password_confirmation')
            <div class="invalid-feedback">
             {{ $message }}
            </div>
            @enderror
          </div>

        </div>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-sm btn-ui px-3">{{ __('Register') }}</button>
      </div>
    </div>
  </form>
@endsection