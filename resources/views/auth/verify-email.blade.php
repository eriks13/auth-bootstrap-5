@extends('layout.auth')

@section('content')
<div class="mb-4">
  <div class="d-flex justify-content-center">
    <div class="col-auto">
      <h5 class="fs-ui">{{ ('Verifikasi email terlebih dahulu. atau kirim ulang link verifikasi jiika belum menerima!') }}</h5>
    </div>
  </div>
 </div>

 <div class="row d-flex justify-content-center g-3">
  <div class="col-auto">
    <form action="{{ route('verification.send') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-link btn-sm px-4">{{ __('Kirim Ulang?') }}</button>
    </form>
  </div>
  <div class="col-auto">
    @if (Route::has('logout'))
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-ui btn-sm px-4">{{ __('Logout') }}</button>
      </form>
    @endif
  </div>
 </div>

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