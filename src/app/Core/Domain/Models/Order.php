<?php

namespace App\Core\Domain\Models;

use App\Core\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
