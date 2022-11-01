<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'slug',
        'active'
    ];

    protected $cate = [
        'id',
        'name',
        'active'
    ];

    public function chils(){
        return $this->hasMany(Category::class,'parent_id','id');
    }
}
