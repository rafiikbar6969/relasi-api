<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $fillable = ['name', 'phone', 'email', 'address'];

    public function order()
    {
        return $this->belongsTo(order::class, 'customer_id');
    }
}

