<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'content'
    ];

    public function category()
    {
        // one to many relationship using hasMany
        return $this->hasMany(Category::class);
    }
    //accessor image category
    public function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/news/' . $value)
        );
    }
}
