<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipientInformations extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_reg_number',
        'vat_number',
        'attention_to',
        'address',
        'phone_number',
        'contact_person',
        'email',
    ];
}
