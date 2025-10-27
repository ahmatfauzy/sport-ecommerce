<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{

    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'specification',
        'features',
        'price',
        'stock',
        'images',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'specification' => 'array',
        'features' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute()
    {
        $images = $this->images ?? [];
        if (empty($images)) {
            return 'https://via.placeholder.com/400x300';
        }

        $firstImage = $images[0];
        // Check if it's already a full URL
        if (filter_var($firstImage, FILTER_VALIDATE_URL)) {
            return $firstImage;
        }

        // normalize possible leading "public/" (some records might store that)
        // remove leading "public/" if present
        $imgPath = preg_replace('/^public\\//', '', $firstImage);

        // If it's a storage path, return the full URL
        if (Storage::disk('public')->exists($imgPath)) {
            /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
            $disk = Storage::disk('public');
            return $disk->url($imgPath);
        }

        return 'https://via.placeholder.com/400x300';
    }

    public function getImageUrlsAttribute()
    {
        $images = $this->images ?? [];
        if (empty($images)) {
            return ['https://via.placeholder.com/400x300'];
        }

        return array_map(function ($image) {
            // Check if it's already a full URL
            if (filter_var($image, FILTER_VALIDATE_URL)) {
                return $image;
            }
            // normalize possible leading "public/"
            $imgPath = preg_replace('/^public\\//', '', $image);

            // If it's a storage path, return the full URL
            if (Storage::disk('public')->exists($imgPath)) {
                return asset('storage/' . $imgPath);
            }

            return 'https://via.placeholder.com/400x300';
        }, $images);
    }
}
