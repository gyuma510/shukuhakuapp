@extends('layouts.parent')
@section('title', '予約枠作成')
@section('content')
<div class = "text-center"><br>
    <h3>予約枠作成</h3><br>
</div>
<table class = "table table-sm table-hover">
    <thead>
        <tr class = "text-center bg-light">
            <th>部屋名</th>
            <th>部屋番号</th>
        </tr>
    </thead>
    <tbody>
        <tr class = "text-center table-cell">
            <td class = "align-middle">{{ $room->room_name }}</td>
            <td class = "align-middle">{{ $room->room_number }}</td>
        </tr>
    </tbody>
</table>

<form action = "{{route('number.store')}}" method = "post" class = "text-center">
    @csrf
    <div class = "mb-3">
        <label class="form-label">予約枠</lavel>
        <input type = "number" name = "number" value = "{{old('number')}}" class = "form-control">
        @if ($errors->has('number'))
            <li>{{$errors->first('number')}}</li>
        @endif
    </div>
    <input type = "hidden" name = "room_id" value = "{{ $room->id }}">
    <input type = "submit" value = "決定" class = "btn btn-primary">
</form>
@endsection
