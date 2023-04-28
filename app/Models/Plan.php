<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'room_id'];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }
    public function planPrices()
    {
        return $this->hasMany('App\Models\PlanPrice');
    }
    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }

    public function getDatesArray($startDate, $endDate)
    {
        $dates = [];
    
        $currentDate = $startDate->copy();
    
        while ($currentDate->lte($endDate)) {
            $dates[] = $currentDate->format('Y-m-d');
            $currentDate->addDay();
        }
    
        return $dates;
    }
    
    public function getVacancy($start, $end)
    {
        $date = $start->format('Y-m-d');
        $endDate = $end->format('Y-m-d');
        $room = $this->room;
        $number = $room->number->number; // 修正点
        $reserves = Reserve::where('room_id', $room->id)
            ->where('date', '>=', $date)
            ->where('date', '<=', $endDate)
            ->get();
        $reserved = 0;
        $vacancy = [
            'number' => $room->number - $reservedCount,
            'price' => $plan->price,
        ];
        foreach ($reserves as $reserve) {
            $reserved += $reserve->number_of_guests;
        }
        $vacant = $number - $reserved;
        $price = $this->price * $number;
        return [
            'number' => $vacant,
            'price' => $price,
        ];
    }
    

    

}
