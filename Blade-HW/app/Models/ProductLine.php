<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductLine extends Model
{
    use HasFactory;

    protected $table = "productlines";

    protected $primaryKey = "productLine";

    public $timestamps = false;

    protected $fillable = [
        'productLine',
        'textDescription',
        'htmlDescription',
        'image'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'productLine', 'productLine');
    }
}
