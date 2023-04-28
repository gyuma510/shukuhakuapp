<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reserve;
use App\Models\Plan;
use App\Models\PlanPrice;
use App\Models\Number;



class ReserveController extends Controller
{
    public function top()
    {
        return view('reserve.top');
    }

    public function access()
    {
        return view('reserve.access');
    }

    public function index()
    {
        $plans = Plan::all();
        $rooms = Room::all();
        return view('reserve.index', compact('plans', 'rooms'));
    }

    public function create($id)
    {
        $plan = Plan::find($id);
        $date = request('date');
        return view('reserve.create', compact('plan', 'date'));
    }

    public function store(Request $request)
    {
        $plan = new Plan();
        $plan->plan_name = $request->plan_name;
        $plan->description = $request->description;
        $plan->room_id = $request->room_id;

        if ($request->hasFile('path')) {
            $image = $request->file('path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $plan->path = $filename;
        }
        
        $plan->save();
        return redirect()->route('plan.index')->with('flash_message', '宿泊プランを登録しました');
    }

    public function show(Plan $plan)
    {
        $room = $plan->room;
        $roomId = $room->id;
    // 予約テーブルから予約日程を取得し、JSON形式でビューに渡す
    $reserves = $plan->reserves()->get();
    $unavailableDates = $reserves->pluck('date')->toJson();
    $startDate = now()->startOfMonth();
    $endDate = now()->addMonths(6)->endOfMonth();
    $reserves = Reserve::where('plan_id', $plan->id)->get();
    $reservedDates = [];
    foreach ($reserves as $reserve) {
        $reservedDates[] = [
            'title' => 'Reserved',
            'start' => $reserve->date,
        ];
    }
    $vacancies = [];
    for ($date = $startDate; $date <= $endDate; $date->addDay()) {
        $vacancy = $plan->getVacancy($date, $date);
        $vacancies[] = [
            'title' => $vacancy['number'] . ' rooms available, price: ' . $vacancy['price'] . ' yen',
            'start' => $date->format('Y-m-d'),
        ];
    }
    $events = array_merge($reservedDates, $vacancies);
    $eventsJson = json_encode($events);
    
    
    return view('reserve.show', [
        'plan' => $plan,
        'eventsJson' => $eventsJson,
    ]);
    }

    public function edit(string $id)
    {
        $plan = Plan::find($id);
        return view('plan.edit', compact('plan'));
    }

    public function update(PlanRequest $request, string $id)
    {
        $plan = Plan::find($id);
        $plan->plan_name = $request->plan_name;
        $plan->description = $request->description;
        $plan->room_id = $request->room_id;

        if ($request->hasFile('path')) {
            $image = $request->file('path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $plan->path = $filename;
        }

        $plan->save();
        return redirect()->route('plan.index')->with('flash_message', '宿泊プランを編集しました');
    }

    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return redirect()->route('plan.index')->with('flash_delete', '宿泊プランを削除しました');
    }
}
