<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image'
    ];

    // function relationship with news
    public function news()
    {
        // one to many relationship using hasMany
        return $this->hasMany(News::class);
    }
    //accessor image category
    public function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/category/' . $value)
        );
    }
}
