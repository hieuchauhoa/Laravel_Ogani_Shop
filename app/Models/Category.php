<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    public $name;
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'slug',
        'active'
    ];
}
