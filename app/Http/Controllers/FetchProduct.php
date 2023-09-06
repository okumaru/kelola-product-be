<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\ValidationException;
use \Illuminate\Database\QueryException;
use \App\Models\Products;

class FetchProduct extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    try {
      $products = Products::with('images');

      $search = $request->input('search');
      if ($search)
        $products = $products->where('description', 'like', "%{$search}%");

      return response($products->paginate(5));

    } catch (ValidationException $e) {
      return response([
        'errors' => $e->errors(),
      ], $e->status);
    } catch (QueryException $e) {
      dd($e->errorInfo);
    } catch (\Exception $e) {
      return response([
        'errors' => [$e->getMessage()]
      ], $e->getCode());
    }
  }
}
