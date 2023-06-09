<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suppliers extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'company_name',
        'pic_name',
        'phone_1',
        'phone_2',
        'address',
    ];
    protected $dates = ['deleted_at'];
}
