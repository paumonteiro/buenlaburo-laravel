<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public function index() {
    $products = \App\Product::all();

$variables = [
  "products" => $products,
];

return view('productos', $variables);
}

public function show($id) {
	$product = \App\Product::find($id);

	$variables = [
		"product" => $product,
	];

	return view('show', $variables);
}

public function create() {
	return view('create');
}

public function store(Request $request) {
    $rules = [
        "name" => "required|unique:products",
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

    $request->validate($rules, $messages);

    $producto = \App\Product::create([
        'name' => $request->input('name'),
        'image' => $request->input('image'),
        'active' => $request->input('active'),
        'cost' => $request->input('cost'),
        'profit_margin' => $request->input('profit_margin'),
        'category_id' => $request->input('category_id'),
        'created_at' => $request->input('created_at'),
        'updated_at' => $request->input('updated_at'),
    ]);

    return redirect('/productos');
}
}
