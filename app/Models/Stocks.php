<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'document_number',
        'supplier_id',
        'product_id',
        'qty',
        'type', // 0=opname, 1=in, 2=out
        'remark',
        'document_file',
    ];
}
