<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Number;
use App\Http\Requests\NumberRequest;

class NumberController extends Controller
{
    public function index()
    {
        $numbers = Number::all();
        $rooms = Room::all();
        return view('number.index', compact('numbers', 'rooms'));
    }

    public function create(string $room_id)
    {
        $room = Room::find($room_id);
        return view('number.create', compact('room'));
    }

    public function store(NumberRequest $request)
    {
        $number = new Number();
        $number->number = $request->number;
        $number->room_id = $request->room_id;
        $number->save();
        return redirect()->route('number.index')->with('flash_message', '予約枠を登録しました');
    }

    public function edit(string $id)
    {
        $number = Number::find($id);
        return view('number.edit', compact('number'));
    }

    public function update(NumberRequest $request, string $id)
    {
        $number = Number::find($id);
        $number->number = $request->number;
        $number->room_id = $request->room_id;
        $number->save();
        return redirect()->route('number.index')->with('flash_message', '予約枠を編集しました');
    }

    public function destroy(string $id)
    {
        $number = Number::find($id);
        $number->delete();
        return redirect()->route('number.index')->with('flash_delete', '予約枠を削除しました');
    }
}
