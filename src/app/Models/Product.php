<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'supplier_id',
        'product_name',
        'buying_price',
        'selling_price',
        'quantity',
        'image'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('product_name', 'ilike', '%' . $search . '%');
        });
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
