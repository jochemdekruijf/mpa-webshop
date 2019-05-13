@extends('layouts.layout');

@section('content');
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update') }}">
      {!! csrf_field() !!}
          <div class="form-group">
               
              <label for="product_name">product name:</label>
              <input type="text" class="form-control" name="product_name"/>
          </div>
          <div class="form-group">
              <label for="product_price">Price of product:</label>
              <input type="text" class="form-control" name="product_price"/>
          </div>
          <div class="form-group">
              <label for="product_qty">Quantity:</label>
              <input type="text" class="form-control" name="product_qty"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection