<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use HasFactory;
    protected $table = 'product_photos';

    protected $fillable = ['product_id', 'photo_path'];
    protected $casts = [
        'photo_path' => 'json',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
