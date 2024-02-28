@extends('layout.auth')

@section('content')
<div class="mb-4">
  <div class="d-flex justify-content-center">
    <div class="col-auto">
      <h5 class="fs-ui">{{ ('Update Password') }}</h5>
    </div>
  </div>
 </div>
  <form action="{{ route('password.update') }}" method="POST" class="row g-3 justify-content-center">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="col-lg-6">
      <div class="card pb-2 px-2">
        <div class="card-body">
          <div class="col-md-12">
            <label for="email" class="form-label fs-ui">{{ __('Email') }}</label>
            <input type="email" class="form-control form-control-md @error('email') is-invalid  @enderror" name="email" value="{{ old('email', $email) }}" id="email" required autocomplete="email">
           @error('email')
           <div class="invalid-feedback">
            {{ $message }}
          </div>
           @enderror
          </div>
          <div class="col-md-12">
            <label for="password" class="form-label fs-ui">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control form-control-md @error('password') is-invalid  @enderror" id="password" required autocomplete="new-password">
            @error('password')
            <div class="invalid-feedback">
             {{ $message }}
            </div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="password_confirmation" class="form-label fs-ui">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" class="form-control form-control-md @error('password_confirmation') is-invalid  @enderror" id="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
            <div class="invalid-feedback">
             {{ $message }}
            </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-ui btn-sm px-4">{{ __('Update password') }}</button>
      </div>
    </div>
  </form>
@endsection