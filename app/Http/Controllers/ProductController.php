<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  
  public function create() {
    $data = [
      'previouslySubmittedProducts' => Storage::exists('products.json') ? json_decode(Storage::get('products.json')) : null,
    ];
    return view('products.form', $data);
  }
  
  public function store(Request $request) {
    $jsonProduct = json_encode(array_merge($request->only(['name', 'stock', 'price']), ['created_at' => Carbon::now()->toDateTimeString()]));
    if(!Storage::exists('products.json')) {
      Storage::put('products.json', '[' . $jsonProduct. ']');
    }
    else {
      $content = Storage::get('products.json');
      $newContent = substr($content, 0, -1) . "," . $jsonProduct . "]";
      Storage::put('products.json', $newContent);
    }
    return $jsonProduct;
  }
}
