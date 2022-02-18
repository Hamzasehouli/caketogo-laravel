<?php

namespace App\Models;

use App\models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}