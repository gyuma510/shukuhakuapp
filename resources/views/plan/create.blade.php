@extends('layouts.parent')
@section('title', '宿泊プラン作成')
@section('content')
<div class = "text-center"><br>
    <h3>宿泊プラン作成</h3><br>
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

<form action = "{{route('plan.store')}}" method = "post" class = "text-center" enctype="multipart/form-data">
    @csrf
    <div class = "mb-3">
        <label class="form-label">プラン名</lavel>
        <input type = "text" name = "plan_name" value = "{{old('plan_name')}}" class = "form-control">
        @if ($errors->has('plan_name'))
            <li>{{$errors->first('plan_name')}}</li>
        @endif
    </div>
    <div class = "mb-3">
        <label class="form-label">プラン概要</lavel>
        <textarea name = "description" class = "form-control">{{ old('description') }}</textarea><br>
        @if ($errors->has('description'))
            <li>{{$errors->first('description')}}</li>
        @endif
    </div>
    <div class = "mb-3">
        <label class="form-label">画像</lavel>
        <input type = "file" name = "path">
        @if ($errors->has('path'))
            <li>{{$errors->first('path')}}</li>
        @endif
    </div>

    <input type = "hidden" name = "room_id" value = "{{ $room->id }}">
    <input type = "submit" value = "登録" class = "btn btn-primary">
</form>
@endsection
