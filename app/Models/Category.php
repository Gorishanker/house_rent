<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'    => 'name',
                'maxLength' => 150,
                'method'    => null,
                'separator' => '_',
                'unique'    => true,
                'onUpdate'  => false,
            ]
        ];
    }

    public function category_images()
    {
        return $this->hasMany(CategoryImage::class, 'category_id');
    }
}
