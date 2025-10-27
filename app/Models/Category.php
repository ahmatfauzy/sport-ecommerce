<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;


class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // remove leading "public/" if present
        $imgPath = preg_replace('/^public\\//', '', $this->image);

        // Cek apakah file ada di disk public
        if (Storage::disk('public')->exists($imgPath)) {
            return asset("storage/" . $imgPath);
        }

        return null;
    }
}
