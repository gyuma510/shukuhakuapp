<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Plan;
use App\Http\Requests\PlanRequest;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $rooms = Room::all();
        return view('plan.index', compact('plans', 'rooms'));
    }

    public function create($room_id)
    {
        $room = Room::find($room_id);
        return view('plan.create', compact('room'));
    }

    public function store(PlanRequest $request)
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

    public function show(Request $request, string $id)
    {
        $plan = Plan::find($id);
        return view('plan.show', compact('plan'));
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
