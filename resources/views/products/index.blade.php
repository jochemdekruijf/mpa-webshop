@extends('layouts.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>


<nav class="navbar navbar-light bg-primary">
  <a class="navbar-brand" href="?">
    <img src="https://www.searchpng.com/wp-content/uploads/2019/02/Bootstrap-Logo-PNG-715x715.png" width="30" height="30" alt="">
  </a>
</nav>

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  	<nav class="nav">
		<a class="nav-link" href="{{ URL::to('products/create') }}">Add new product</a>
</nav>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>product Name</td>
          <td>Price</td>
          <td>product Quantity</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>






        @foreach($products as $product)
        
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_price}}</td>
            <td>{{$product->product_qty}}</td>
            <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  <!-- @csrf -->
                  {!! csrf_field() !!}
                  <!-- @method('DELETE') -->
                  {{method_field('DELETE')}} 

                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection