@extends('layouts.parent')
@section('title', '宿泊プラン')
@section('content')
<div class = "text-center"><br>
    <h3>宿泊プラン</h3><br>
</div>
<table class="table table-sm table-hover">
  <thead>
    <tr class="text-center bg-light">
      <th>プラン名</th>
      <th>プラン詳細</th>
      <th>画像</th>
      <th>部屋名</th>
      <th>料金</th>
      <th>詳細</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($rooms as $room)
        @foreach ($room->plans as $plan)
        <tr class="text-center table-cell">
            <td class="align-middle">{{ $plan->plan_name }}</td>
            <td class="align-middle">{{ $plan->description }}</td>
            <td class="align-middle"><img src="{{ asset('images/'.$plan->path) }}" width="100"></td>
            <td class="align-middle">{{ $room->room_name }}</td>
            @if ($plan->planPrices)
                <td class="align-middle">{{ $plan->planPrices->min('price') }}円〜</td>
            @else
                <td class="align-middle">-</td>
            @endif
            <td class="align-middle"><a href = "{{ route('reserve.show', $plan->id) }}">詳細</a></td>
        </tr>
        @endforeach
        @endforeach
  
  </tbody>
</table>
@endsection
