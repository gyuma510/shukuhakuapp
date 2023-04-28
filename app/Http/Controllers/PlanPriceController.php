<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanPrice;
use App\Models\Plan;
use App\Http\Requests\PlanPriceRequest;

class PlanPriceController extends Controller
{
    public function index($plan_id)
    {
        $plan_prices = PlanPrice::where('plan_id', $plan_id)->get();
        $plan = Plan::find($plan_id);
        return view('plan_price.index', compact('plan_prices', 'plan', 'plan_id'));
    }

    public function create($plan_id)
    {
        $plan = Plan::find($plan_id);
        return view('plan_price.create', compact('plan', 'plan_id'));
    }

    public function store(PlanPriceRequest $request)
    {
        $plan_price = new PlanPrice();
        $plan_price->start_date = $request->start_date;
        $plan_price->end_date = $request->end_date;
        $plan_price->price = $request->price;
        $plan_price->plan_id = $request->plan_id;
        $plan_price->save();
        return redirect()->route('plan_price.index', ['plan_id' => $request->plan_id])->with('flash_message', '料金を設定しました');
    }

    public function show(Request $request, string $id)
    {
        $plan_price = PlanPrice::find($id);
        return view('plan_price.show', compact('plan_price'));
    }

    public function edit($plan_id, string $id)
    {
        $plan_price = PlanPrice::find($id);
        $plan = Plan::find($plan_id);
        return view('plan_price.edit', compact('plan_price', 'plan', 'plan_id'));
    }

    public function update(PlanPriceRequest $request, string $id)
    {
        $plan_price = PlanPrice::find($id);
        $plan_price->start_date = $request->start_date;
        $plan_price->end_date = $request->end_date;
        $plan_price->price = $request->price;
        $plan_price->plan_id = $request->plan_id;
        $plan_price->save();
        $plan = Plan::find($request->plan_id);
        return redirect()->route('plan_price.index', ['plan_id' => $request->plan_id])->with('flash_message', '料金設定を変更しました');
    }

    public function destroy(string $id)
    {
        $plan_price = PlanPrice::find($id);
        $plan_price->delete();
        return redirect()->route('plan_price.index')->with('flash_delete', '料金設定を削除しました');
    }
}
