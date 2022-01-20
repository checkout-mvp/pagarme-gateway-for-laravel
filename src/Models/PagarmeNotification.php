<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagarmeNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_order',
        'status',
        'event',
        'store_name',
        'data'
    ];
}
