<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'title',
        'rent',
        'address',
        'size',
        'room_category',
        'additional_facilities',
        'apt_overview',
        'features',
        'is_active',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'    => 'title',
                'maxLength' => 150,
                'method'    => null,
                'separator' => '_',
                'unique'    => true,
                'onUpdate'  => false,
            ]
        ];
    }

    public function property_images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }
}
