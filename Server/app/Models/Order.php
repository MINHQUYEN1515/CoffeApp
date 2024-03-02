<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'quantity', 'create_day', 'bill_id', 'total', 'size', 'status', 'user_id'];
    protected $table = 'order_item';
    protected $primaryKey = 'ID';
    public const Status = [
        'cart' => 1,
        'payment' => 2,
        'inactive' => 3,
        'process' => 4
    ];
    public $timestamps = false;
    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'product_id');
    }
    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class, 'bill_id');
    }
}
