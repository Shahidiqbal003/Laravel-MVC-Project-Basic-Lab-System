<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'primary_email',
        'notification_emails',
        'primary_phone',
        'whatsapp_number',
        'address',
    ];

    protected $casts = [
        'notification_emails' => 'array',
    ];
}
