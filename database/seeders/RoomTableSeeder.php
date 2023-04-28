<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomTableSeeder extends Seeder
{
    public function run(): void
    {
        Room::create([
            'room_name' => '海の見える客室',
            'room_number' => '101号室',
        ]);

        Room::create([
            'room_name' => '山の見える客室',
            'room_number' => '102号室',
        ]);

        Room::create([
            'room_name' => '角部屋客室',
            'room_number' => '103号室',
        ]);

        Room::create([
            'room_name' => '最上階客室',
            'room_number' => '104号室',
        ]);

        Room::create([
            'room_name' => '特別室',
            'room_number' => '105号室',
        ]);
    }
}
