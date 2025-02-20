<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'SKU',
        'name',
        'unit_price',
        'stock',
        'status'
    ];

    public function sales():BelongsToMany
    {
        return $this->belongsToMany(Sale::class, 'product_sales')
            ->withPivot(['quantity', 'subtotal'])
            ->withTimestamps();
    }
}
