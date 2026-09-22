<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function products(){
        return $this -> belongsToMany(Product::class);
    }
}
