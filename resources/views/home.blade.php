@extends('layout.app')

@section('content')
<div class="mb-4">
  <div class="d-flex justify-content-between">
    <div class="col-auto">
      <h5 class="fs-ui">{{ __('Welcome To Siple ui') }}</h5>
    </div>
  </div>
</div>
<div class="row g-3">
  <div class="col-lg-6">
    <div class="card pb-2 px-2">
      <div class="card-body">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, commodi.
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card mb-2">
      <div class="card-body">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti, sed?
      </div>
    </div>
  </div>
</div>



@endsection