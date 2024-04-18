<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_date',
        'due_date',
        'net_due',
        'total_amount',
        'status',
        'invoice_description',
        'line_item',
        'line_item_description',
        'hours_worked',
        'rate',
        'logo',
        'company_name',
        'template_id',

    ];
}
