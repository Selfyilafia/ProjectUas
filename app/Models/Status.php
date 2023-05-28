<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Klaim;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function klaims(){
        return $this->hasMany(Klaim::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
