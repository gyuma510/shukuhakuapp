@extends('layouts.parent')
@section('title', '宿泊プラン一覧')
@section('content')
<div class = "text-center"><br>
    <h3>宿泊プラン一覧</h3><br>
</div>
<table class="table table-sm table-hover">
  <thead>
    <tr class="text-center bg-light">
      <th>部屋名</th>
      <th>部屋番号</th>
      <th>宿泊プラン作成</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($rooms as $room)
      <tr class="text-center table-cell">
        <td class="align-middle">{{ $room->room_name }}</td>
        <td class="align-middle">{{ $room->room_number }}</td>
        <td class="align-middle"><a class="btn btn-outline-primary" href="{{ route('plan.create', ['room_id' => $room->id]) }}">宿泊プラン作成</a></td>
      </tr>
      @foreach ($room->plans as $plan)
        <tr class="text-center table-cell">
          <td class="align-middle"><a href = "{{ route('plan.show', $plan->id) }}">{{ $plan->plan_name }}</a></td>
          <td class="align-middle">{{ $plan->description }}</td>
          <td class="align-middle"><img src="{{ asset('images/'.$plan->path) }}" width="100"></td>
          <td>
            <a href="{{ route('plan.edit', $plan->id) }}" class="btn btn-outline-success">編集</a>
            <form action="{{ route('plan.destroy', $plan->id) }}" method="post" onsubmit='return confirm("削除しますか？");'>
              @csrf
              @method('DELETE')
              <input type="submit" value="削除" class="btn btn-outline-danger">
            </form>
          </td>
        </tr>
      @endforeach
    @endforeach
  </tbody>
</table>
@endsection
