<?php

namespace App\Models;

use App\models\Comment;
use App\models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'descritpion',
        'ingredients ',
        'allergens',
        'weight',
        'photo',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}