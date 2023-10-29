<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Termwind\terminal;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id' , 'description'];


    public function customer(){

        return $this->belongsTo(Customer::class);
    }

    public function products(){

        return $this->belongsToMany('App\Models\Product');
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}
