@extends('layouts.parent')
@section('title', '予約枠編集')
@section('content')
<div class = "text-center"><br>
    <h3>予約枠編集</h3><br>
</div>
<form action = "{{route('number.update', $number->id) }}" method = "post" class = "text-center">
    @csrf
    <div class = "mb-3">
    @method('PUT')
        <input type = "hidden" name = "id" value = "{{ $number->id }}">
        <input type = "hidden" name = "room_id" value = "{{ $number->room_id }}">
        <label class="form-label">予約枠</lavel>
        <input type = "number" name = "number" value = "{{ old('number', $number->number) }}" class = "form-control">
        @if ($errors->has('number'))
            <li>{{$errors->first('number')}}</li>
        @endif
        <input type = "submit" value = "変更" class = "btn btn-primary">
        <a href = "{{ route('number.index') }}"><button type = "button" class = "btn btn-secondary">戻る</button></a>
    </div>
</form>
@endsection
