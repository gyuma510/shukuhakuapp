<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'room_id'];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
}
