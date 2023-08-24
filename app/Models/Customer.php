<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'firstName' , 'lastName', 'email' , 'nationalCode' , 'gender' , 'phoneNumber',
            'country' , 'city' , 'address' , 'education' , 'job' , 'password'
        ];


    protected $hidden = [
        'password',
    ];


    protected $casts = [
        'password' => 'hashed',
    ];

    public function orders(){

        return $this->hasMany(Order::class);
    }
}
