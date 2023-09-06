<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\ValidationException;
use \App\Models\Products;

class UpdateProduct extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Products $product, Request $request)
  {
    try {
      $data = $request->all();
      $update = $product->update($data);
      if (!$update)
        throw new \Exception("Failed to update product.", 500);

      return response($product, 200);

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
