<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'code',
        'unit_buying_cost',
        'unit_selling_cost',
        'quantity',
        'tax_rate',
        'sold_out_flag'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}