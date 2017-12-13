<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller {

  public function index() {
      $products = \App\Product::all();
      $variables = ["products" => $products,];
      return view('productos', $variables);
  }

  public function show($id) {
    	$product = \App\Product::find($id);
    	$variables = ["product" => $product];
    	return view('show', $variables);
  }

  public function create() {
  	  return view('create');
  }

  public function store(Request $request) {
      $rules = [
          "name" => "required|unique:products",
          "image" => "required|string",
          "active" => "required|string",
          "cost" => "required|numeric",
          "profit_margin" => "required|numeric",
          "category_id" => "required|numeric|between:1,3"
      ];

      $messages = [
          "required" => "El :attribute es requerido!",
          "unique" => "El :attribute tiene que ser único!",
          "numeric" => "El :attribute tiene que ser numérico!",
          "between" => "El :attribute tiene que estar entre :min y :max!"
      ];

      $this->validate($request, $rules, $messages);

      $producto = new Product;
      $producto->name = $req["name"];

      $image = $req->file("image");
      $nombreArchivo = $image->storePublicly("public/img");
      $producto->image = $nombreArchivo;

      $producto->active = $req["active"];
      $producto->cost = $req["cost"];
      $producto->profit_margin = $req["profit_margin"];
      $producto->category_id =$req["category_id"];
      $producto->created_at = $req["created_at"];
      $producto->updated_at = $req["updated_at"];

      $producto->save();


      return redirect('/productos');
  }

  public function getPrice() {
	    return $this->cost + ($this->cost * $this->profit_margin / 100);
  }
}
