<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function status()
    {
        return $this->hasOne('App\Models\Status');
    }
}
