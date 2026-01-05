<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticTest extends Model
{
    use HasFactory;

    protected $table = 'diagnostic_tests';

    protected $fillable = [
        'name',
        'category',
        'price',
        'sample_type',
        'report_time',
        'short_description',
        'description',
        'show_on_home',
        'is_coming_soon',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'show_on_home'   => 'boolean',
        'is_coming_soon' => 'boolean',
        'is_active'      => 'boolean',
    ];
}
