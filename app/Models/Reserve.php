<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
    const STATUS_AVAILABLE = 0;
    const STATUS_BOOKED = 1;
}
