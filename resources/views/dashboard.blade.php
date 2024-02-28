@extends('layout.app')

@section('content')
<div class="mb-4">
    <div class="d-flex justify-content-between">
      <div class="col-auto">
        <h5 class="fs-ui">{{ __('Welcome To Siple ui Home') }}..{{ Auth::user()->name }}</h5>
      </div>
    </div>
  </div>
  <div class="row g-3">
    <div class="col-lg-6">
      <div class="card pb-2 px-2">
        <div class="card-body">
          <p class="fs-ui">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, commodi.</p>
        </div>
      </div>
    </div>
  </div>

  {{-- toast message --}}
 <div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">{{ Auth::user()->name }}</strong>
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