<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryImage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'category_id',
        'name',
    ];
    public static function getNameAttribute($value)
    {
        return  FileService::getFileUrl('files/categories/', $value);
    }
}
