<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_tax_id',
        'address',
        'phone_number',
        'email',
        'bank_details',
        'website_url',
    ];

    // Define the relationship between UserInformations and User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
