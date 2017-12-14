<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller {

  public function index() {
      $products = \App\Product::all();
      $variables = [
          "products" => $products,
      ];
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
          "image" => "required",
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

      $extensionImagen = $request->file('image')->getClientOriginalExtension();
      $fotoPath = $request->file('image')->storeAs('productos', uniqid() . "." . $extensionImagen, 'public');




      $producto = new Product;
      $producto->name = $request["name"];

      /*
      $imagen = $request->file("image");
      $nombreArchivo = $imagen->storePublicly("public/img");

      */
      $producto->image = $fotoPath;
      $producto->active = $request["active"];
      $producto->cost = $request["cost"];
      $producto->profit_margin = $request["profit_margin"];
      $producto->category_id =$request["category_id"];

      /*$producto->created_at = $request["created_at"];
      $producto->updated_at = $request["updated_at"];*/

      $producto->save();

      //dd($producto);
      return redirect('/productos');
  }

  public function getPrice() {
	    return $this->cost + ($this->cost * $this->profit_margin / 100);
  }

  public function category() {
  	   return $this->belongsTo('\App\Category', 'category_id', 'id');
  }
}
