<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'status',
        'createDay',
        'comment_product_id',
        'shipper_comment_id',
        'user_id',
        'payment',
        'money_ship'
    ];
    protected $table = 'bill';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
