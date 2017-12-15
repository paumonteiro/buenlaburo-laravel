<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;

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
      $input = $request->except('_token');
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
      $producto->image = $fotoPath;
      $producto->active = $request["active"];
      $producto->cost = $request["cost"];
      $producto->profit_margin = $request["profit_margin"];
      $producto->category_id =$request["category_id"];
      $producto->user_id = Auth::user()->id;

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

  public function destroy($id) {
    $product = \App\Product::find($id);

    $product->delete();

    return redirect('/productos');
}

  public function edit($id) {
    $product = \App\Product::find($id);

    $variables = [
        'product' => $product,
    ];

    return view('edit', $variables);
}


public function update(Request $request, $id) {
    $product = \App\Product::find($id);

    if ($request->has('name')) {
      $product->name = $request->input('name');
    }

    if ($request->has('image') && $request->file('image') !== null) {

      $extensionImagen = $request->file('image')->getClientOriginalExtension();
      $fotoPath = $request->file('image')->storeAs('productos', uniqid() . "." . $extensionImagen, 'public');

      $product->image= $fotoPath;
    }

    if ($request->has('active')) {
      $product->active = $request->input('active');
    }

    if ($request->has('cost')) {
      $product->cost = $request->input('cost');
    }

    if ($request->has('profit_margin')) {
      $product->profit_margin = $request->input('profit_margin');
    }

    /*if ($request->has('category_id')) {
      $product->name = associate($category);
    }*/

    $product->save();

    return redirect('/productos/' . $id);
}

}
