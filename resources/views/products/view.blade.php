@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
      </div>
      <div class="panel-content">
        <div class="col-xs-12">
            <div class="col-xs-4">
              <b>Product</b> <br>
              {{ $product->name }}
            </div>
            <div class="col-xs-4">
              <b>Quantity in Stock</b> <br>
              {{ $product->stock }}
            </div>
            <div class="col-xs-4">
              <b>Price Per Item</b> <br>
              ${{ $product->stock }}
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection