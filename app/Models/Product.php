<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "products";

    protected $fillable = ['product_name', 'parent_category_id', 'subcategory_id', 'product_description', 'regular_price', 'sale_price'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
