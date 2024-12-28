<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'email',
        'password',
        'status',
        'account_type',
        'last_login',
    ];
    protected $casts = [
        'last_login' => 'datetime',
    ];
}
