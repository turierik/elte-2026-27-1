<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function author(){
        return $this -> belongsTo(User::class);
    }

    public function likes(){
        return $this -> belongsToMany(User::class);
    }
}
