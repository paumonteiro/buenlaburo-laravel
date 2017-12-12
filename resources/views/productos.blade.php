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
  <div class="box-producto col-md-4">
    <img src="img/box-producto1.jpg" alt="foto-izq" class="imagen">
    <h2 class="titulo"> Bomber </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ante tortor, condimentum ac consequat nec, iaculis laoreet purus.</p>
    <button type="button" name="button">Comprar</button>
  </div>
  <div class="box-producto col-md-4">
    <img src="img/box-producto2.jpg" alt="foto-izq" class="imagen">
    <h2 class="titulo"> Trooper </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ante tortor, condimentum ac consequat nec, iaculis laoreet purus.</p>
    <button type="button" name="button">Comprar</button>
  </div>
  <div class="box-producto col-md-4">
    <img src="img/box-producto3.jpg" alt="foto-izq" class="imagen">
    <h2 class="titulo"> Retro Disco </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ante tortor, condimentum ac consequat nec, iaculis laoreet purus.</p>
    <button type="button" name="button">Comprar</button>
  </div>
  </div>
  <hr class="linea-main">
  <div class="row"> <!--segunda fila -->
  <div class="box-producto col-md-4">
    <img src="img/box-producto5.jpg" alt="foto-izq" class="imagen">
    <h2 class="titulo"> Cactus </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ante tortor, condimentum ac consequat nec, iaculis laoreet purus.</p>
    <button type="button" name="button">Comprar</button>
  </div>
  <div class="box-producto col-md-4">
    <img src="img/box-producto4.jpg" alt="foto-izq" class="imagen">
    <h2 class="titulo"> Coconut </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ante tortor, condimentum ac consequat nec, iaculis laoreet purus.</p>
    <button type="button" name="button"> Comprar </button>
  </div>
  <div class="box-producto col-md-4">
    <img src="img/box-producto6.jpg" alt="foto-izq" class="imagen">
    <h2 class="titulo"> Luna </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ante tortor, condimentum ac consequat nec, iaculis laoreet purus.</p>
    <button type="button" name="button">Comprar</button>
  </div>
  </div>
</div>
  @endsection
