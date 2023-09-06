<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\ValidationException;
use \App\Models\Products;

class AddProduct extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    try {
      $val = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'discountPercentage' => 'required',
        'rating' => 'required',
        'stock' => 'required',
        'brand' => 'required',
        'category' => 'required',
        'thumbnail' => 'nullable',
      ]);

      $prod = Products::create($val);
      return response($prod, 201);

    } catch (ValidationException $e) {
      return response([
        'errors' => $e->errors(),
      ], $e->status);
    } catch (\Exception $e) {
      return response([
        'errors' => [$e->getMessage()]
      ], $e->getCode());
    }
  }
}
