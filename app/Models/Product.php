<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['productName', 'number', 'color', 'price', 'productImage'];

    public function categories()
    {

        return $this->belongsToMany('App\Models\Category');
    }

    public function orders()
    {

        return $this->belongsToMany('App\Models\Order');
    }
}
