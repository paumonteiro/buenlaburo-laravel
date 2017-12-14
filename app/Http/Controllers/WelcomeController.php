<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class WelcomeController extends Controller
{
  public function index() {
      $products = \App\Product::all();
      $variables = [
          "products" => $products,
      ];
      return view('welcome', $variables);
  }
}
