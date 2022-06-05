<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    const STATUSES = [
        'success' => 'Success',
        'failed' => 'Failed',
        'processing' => 'Processing',
    ];

    protected $casts = [
        'order_date' => \Naykel\Gotime\Casts\DateCast::class,
        'amount' => \Naykel\Gotime\Casts\CurrencyCast::class,
    ];

    public function getStatusColorAttribute()
    {
        return [
            'success' => 'green',
            'failed' => 'red',
        ][$this->status] ?? '';
    }
}
