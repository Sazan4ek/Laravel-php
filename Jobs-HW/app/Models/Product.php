<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $primaryKey = "productCode";

    public $timestamps = false;

    protected $fillable = [
        'productCode',
        'productName',
        'productLine',
        'productScale',
        'productVendor',
        'productDescription',
        'quantityInStock',
        'buyPrice',
        'MSRP'
    ];

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'productCode', 'productCode');
    }
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductLine::class, 'productLine', 'productLine');
    }
}
