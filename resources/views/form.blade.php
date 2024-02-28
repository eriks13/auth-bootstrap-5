@extends('layout.app')


@section('content')
<div class="mb-4">
  <div class="d-flex justify-content-between">
    <div class="col-auto">
      <h5 class="fs-ui">Siple ui Form</h5>
    </div>
  </div>
</div>
<form class="row g-3">
  <div class="col-lg-8">
    <div class="card pb-2 px-2">
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label for="name" class="form-label fs-ui">Product Name</label>
            <input type="text" class="form-control form-control-md" id="name" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-6">
            <label for="price" class="form-label fs-ui">Price</label>
            <input type="number" class="form-control form-control-md" id="price" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-6">
            <label for="quantity" class="form-label fs-ui">Quantity</label>
            <input type="number" class="form-control form-control-md" id="quantity" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-6">
            <label for="stock" class="form-label fs-ui">Stock</label>
            <input type="number" class="form-control form-control-md" id="stock" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-12">
            <label for="description" class="form-label fs-ui">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="2"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <p class="fs-ui">Relationshipe</p>
    <div class="card mb-2">
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-12">
            <select class="form-select" aria-label="Relationshipe">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-2">
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="remember_me" name="rememberme" required>
              <label class="form-check-label fs-ui" for="remember_me">
                Is Active
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-sm btn-ui px-3">Create</button>
  </div>
</form>
@endsection