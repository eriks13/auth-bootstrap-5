@extends('layout.auth')

@section('content')
<div class="mb-4">
  <div class="d-flex justify-content-center">
    <div class="col-auto">
      <h5 class="fs-ui">{{ ('Reset Password') }}</h5>
    </div>
  </div>
 </div>
  <form action="{{ route('password.email') }}" method="POST" class="row g-3 justify-content-center">
    @csrf
    <div class="col-lg-6">
      <div class="card pb-2 px-2">
        <div class="card-body">
          <div class="col-md-12">
            <label for="email" class="form-label fs-ui">{{ __('Email') }}</label>
            <input type="email" class="form-control form-control-md @error('email') is-invalid  @enderror" name="email" value="{{ old('email') }}" id="email" required autocomplete="email">
           @error('email')
           <div class="invalid-feedback">
            {{ $message }}
          </div>
           @enderror
          </div>
        </div>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-ui btn-sm px-4">{{ __('Reset Password') }}</button>
      </div>
    </div>
  </form>

  {{-- toast message --}}
 <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">{{ __('Reset Password') }}</strong>
        <button type="button" class="btn btn-ui btn-sm rounded-pill">
          <i class="bi bi-bell"></i>
        </button>
      </div>
      <div class="toast-body">
        @if (session('success'))
          {{ session('success') }}
        @endif
      </div>
    </div>
  </div>
  {{-- toast message --}}
@endsection


@section('script')
<script>
  // Ambil pesan dari session flash
  var message = "{{ session('success') }}";

  // Periksa apakah pesan ada dan tidak kosong
  if (message) {
      // Tampilkan toast
      var toast = new bootstrap.Toast(document.getElementById('myToast'));
      toast.show();
  }
</script>

@endsection