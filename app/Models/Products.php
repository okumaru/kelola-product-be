<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Products extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'description',
    'price',
    'discountPercentage',
    'rating',
    'stock',
    'brand',
    'category',
    'thumbnail',
  ];

  public function images(): hasMany
  {
    return $this->hasMany(ProductImages::class, 'productid', 'id');
  }
}
