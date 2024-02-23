<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['name', 'image', 'description', 'category_id', 'status', 'price', 'price_sizeL', 'price_sizeM', 'promotion_sale', 'number', 'update_day', 'create_day'];
    protected $primaryKey = 'id';

    // status product
    public const STATUS = [
        'actice' => 1,
        'isActice' => 2,
        'out_of_stock' => 3
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
