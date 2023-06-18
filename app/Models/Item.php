<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=[
        'item_name',
        'price',
        'description',
        'condition', 
        'type',
        'image', 
        'publish',
        'owner_name',
        'country_code',
        'phone_number',
        'address'];

        public function categories(){
            return $this->belongsToMany('App\Models\Category','category__items');
        }
}
