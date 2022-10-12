<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'price_sale',
        'cate_id',
        'packet',
        'review',
        'images',
        'slug',
        'active'
    ];

    //public function category(){
        //$this->hasOne(Category::class, 'id', 'cate_id');
    //}s
}
