<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'body', 'is_free' , 'price', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
