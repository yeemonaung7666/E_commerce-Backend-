<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image',
        'publish'
    ];

    public function items(){
        return $this->belongsToMany('App\Item','category__items');
    }
}
