<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $hidden = [
        'pivot'
    ];

    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $fillable = ['name', 'price', 'quantity', 'status', 'seller_id', 'image', 'description'];

    public function isAvailable(): bool
    {
        return $this->status == self::AVAILABLE_PRODUCT;
    }

    public function isUnavailable(): bool
    {
        return $this->status == self::UNAVAILABLE_PRODUCT;
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
