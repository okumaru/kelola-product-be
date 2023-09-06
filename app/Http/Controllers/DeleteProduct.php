<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\ValidationException;
use \App\Models\Products;

class DeleteProduct extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Products $product, Request $request)
  {
    try {
      $delete = $product->delete();
      if (!$delete)
        throw new \Exception("Failed to delete product.", 500);

      return response('Success delete product.', 200);

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
