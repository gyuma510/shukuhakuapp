@extends('layouts.parent')
@section('title', '料金一覧')
@section('content')
<div class = "text-center"><br>
    <h3>「{{ $plan->plan_name }}」プラン料金設定</h3><br>
</div>
<table class="table table-sm table-hover">
  <thead>
    <tr class="text-center bg-light">
      <th>期間</th>
      <th>料金</th>
      <th>編集</th>
      <th>削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($plan_prices as $price)
      <tr class="text-center table-cell">
        <td class="align-middle">{{ $price->start_date }}〜{{ $price->end_date }}</td>
        <td class="align-middle">{{ $price->price }}円</td>
        <td><a href="{{ route('plan_price.edit', [$plan->id, $price->id]) }}" class="btn btn-outline-success">編集</a></td>
        <form action="{{ route('plan_price.destroy', [$plan->id, $price->id]) }}" method="post" onsubmit='return confirm("削除しますか？");'>
            @csrf
            @method('DELETE')
                <td><input type="submit" value="削除" class="btn btn-outline-danger"></td>
            </form>
      </tr>
    @endforeach
  </tbody>
</table>
<a href="{{ route('plan_price.create', ['plan_id' => $plan_id]) }}" class="btn btn-primary">新規追加</a>

@endsection
