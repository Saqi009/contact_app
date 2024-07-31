<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function contacts() {
        return $this->hasMany(Contact::class);
    }
}
