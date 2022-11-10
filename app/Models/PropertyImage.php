<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'name',
    ];

    public static function getNameAttribute($value)
    {
        return  FileService::getFileUrl('files/properties/', $value);
    }
}
