<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = "categories";

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'parent_category_id');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
