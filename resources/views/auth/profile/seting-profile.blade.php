@extends('layout.app')

@section('content')
<div class="mb-4">
    <div class="d-flex justify-content-between">
      <div class="col-auto">
        <h5 class="fs-ui">{{ __('Seting your profile here') }}</h5>
      </div>
    </div>
  </div>
  <div class="row g-3">
    <div class="col-lg-6">
      <div class="card pb-2 px-2">
        <div class="card-body">
            Seting profile...
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <form action="{{ route('update.profile',$user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="card mb-2 px-3">
          <div class="card-body">
            <div class="col-md-12">
              <label for="name" class="form-label fs-ui">{{ __('Name') }}</label>
              <input type="text" class="form-control form-control-md @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" name="name" id="name" required autocomplete="username">
             @error('name')
             <div class="invalid-feedback">
              {{ $message }}
             </div>
             @enderror
            </div>
            <div class="col-md-12">
              <label for="email" class="form-label fs-ui">{{ __('Email') }}</label>
              <input type="email" class="form-control form-control-md @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" name="email" id="email" required autocomplete="email">
              @error('email')
              <div class="invalid-feedback">
               {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-12">
              <label for="password" class="form-label fs-ui">{{ __('Password') }}</label>
              <input type="password" name="password" class="form-control form-control-md @error('password') is-invalid @enderror" id="password">
              @error('password')
              <div class="invalid-feedback">
               {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-12 mb-3">
              <label for="password_confirmation" class="form-label fs-ui">{{ __('Confirm Password') }}</label>
              <input type="password" name="password_confirmation" class="form-control form-control-md @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
              @error('password_confirmation')
              <div class="invalid-feedback">
               {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="my-3">
          <button type="submit" class="btn btn-ui btn-sm px-3">Update Profile</button>
        </div>
      </form>
    </div>
  </div>

  {{-- toast message --}}
 <div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto fs-ui">{{ Auth::user()->name }}</strong>
      <button type="button" class="btn btn-ui btn-sm rounded-pill">
        <i class="bi bi-bell"></i>
      </button>
    </div>
    <div class="toast-body fs-ui">
      @if (session('success'))
        {{ session('success') }}
      @elseif (session('status'))
      {{ session('status') }}
      @endif
    </div>
  </div>
</div>
{{-- toast message --}}

@endsection


@section('script')
<script>
  var success = "{{ session('success') }}";
  var status = "{{ session('status') }}";

  if (success) {
      var toast = new bootstrap.Toast(document.getElementById('myToast'));
      toast.show();
  }
  if (status) {
      var toast = new bootstrap.Toast(document.getElementById('myToast'));
      toast.show();
  }


</script>

@endsection