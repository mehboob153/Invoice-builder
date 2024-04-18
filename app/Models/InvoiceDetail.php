<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'name',
        'service_or_good',
        'quantity',
        'rate',
        'description',
        'tax_rate',
        'discount',
        'subtotal',

    ];
}
