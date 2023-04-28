@extends('layouts.parent')
@section('title', '予約枠一覧')
@section('content')

<div class = "text-center"><br>
    <h3>予約枠一覧</h3><br>
</div>
<table class = "table table-sm table-hover">
    <thead>
        <tr class = "text-center bg-light">
            <th>部屋名</th>
            <th>部屋番号</th>
            <th>現在の予約枠</th>
            <th>予約枠作成</th>
            <th>予約枠編集</th>
            <th>予約枠削除</th>
        </tr>
    </thead>
    @foreach ($rooms as $room)
    <tbody>
        <tr class = "text-center table-cell">
            <td class = "align-middle">{{ $room->room_name }}</td>
            <td class = "align-middle">{{ $room->room_number }}</td>
            @php
                $number = $numbers->where('room_id', $room->id)->first();
            @endphp
            @if ($number)
                <td class = "align-middle">{{ $number->number }}</td>
                <td></td>
            @else
                <td class = "align-middle">未設定</td>
                <td class = "align-middle"><a class="btn btn-outline-primary" href="{{ route('number.create', ['room_id' => $room->id]) }}">新規作成</a></td>
            @endif
            <td class = "align-middle">
                @foreach ($numbers as $number)
                    @if ($number->room_id == $room->id)
                        <a href = "{{ route('number.edit', $number->id) }}" class = "btn btn-outline-success">編集</a>
                    @endif
                @endforeach
            </td>
            <td class = "align-middle">
                @foreach ($numbers as $number)
                    @if ($number->room_id == $room->id)
                        <form action = "{{ route('number.destroy', $number->id) }}" method = "post" onsubmit = 'return confirm("削除しますか？");'>
                            @csrf
                            @method('DELETE')
                            <input type = "submit" value = "削除" class = "btn btn-outline-danger">
                        </form>
                    @endif
                @endforeach
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection
