<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_sales',
        'total_quantity',
        'total_profits',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
