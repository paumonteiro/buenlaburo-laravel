@extends('layouts.app')

@section('content')

  <body>
    <div class="container">
      <div class="col-md-4">
        <h1>{{$product->name}}</h1>
        <img src="{{ asset('storage/' . $product->image) }}" alt="" class="imagen">
        <br>
        <br>
        <br>
      </div>
      <div class="col-md-4">
        <br>
        <br>
        <br>
        <h2>${{$product->cost}}</h2>
        <a href="/productos">Ver todos los productos</a>
      </div>

    </div>

  </body>

@endsection
