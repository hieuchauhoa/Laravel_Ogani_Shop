<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'cpu',
        'ram',
        'screen',
        'storage',
        'exten_memmory',
        'cam1',
        'cam2',
        'sim',
        'connect',
        'pin',
        'os',
        'note',
        'pro_id'
    ];
}
