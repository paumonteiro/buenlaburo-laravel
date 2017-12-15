@extends('layouts.app')

@section('content')
<title>Nuestros Productos</title>
<link rel="stylesheet" href="/css/master.css">
<!-- Body -->
<div class="container">

  <h1>
  <strong class="nuevas-camperas">Nuevas camperas Old-school</strong>
  </h1>
  <hr class="linea-main">
  <div class="row">


    @foreach ($products as $product)


      <div class="box-producto col-md-4">
        <img src="{{ asset('storage/' . $product->image) }}" alt="" class="imagen">
        <h2 class="titulo"> {{$product->name}} </h2>
        <h2 class="titulo"> ${{$product->cost}} </h2>
        <a href="/productos/{{$product->id}}">Ver más</a>
        <br>
        @if (Auth::check() && $product->user_id == Auth::user()->id)
          <a href="/productos/{{$product->id}}/edit">Editar</a>
        @endif
      </div>

    @endforeach


  </div>
</div>
  @endsection
