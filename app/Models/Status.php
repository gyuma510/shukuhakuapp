<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Status extends Model
{
    use HasFactory;
    protected $fillable = ['contact_id'];
    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }
}
