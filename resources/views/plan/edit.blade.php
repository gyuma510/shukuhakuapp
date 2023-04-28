@extends('layouts.parent')
@section('title', '宿泊プラン編集')
@section('content')
<div class = "text-center"><br>
    <h3>宿泊プラン編集</h3><br>
</div>
<form action = "{{route('plan.update', $plan->id) }}" method = "post" class = "text-center" enctype="multipart/form-data">
    @csrf
    <div class = "mb-3">
    @method('PUT')
        <input type = "hidden" name = "id" value = "{{ $plan->id }}">
        <input type = "hidden" name = "room_id" value = "{{ $plan->room_id }}">
        <label class="form-label">プラン名</lavel>
        <input type = "text" name = "plan_name" value = "{{ old('plan_name', $plan->plan_name) }}" class = "form-control">
        @if ($errors->has('plan_name'))
            <li>{{$errors->first('plan_name')}}</li>
        @endif
        <label class="form-label">プラン概要</lavel>
        <textarea name = "description" class = "form-control">{{ old('description', $plan->description) }}</textarea><br>
        @if ($errors->has('description'))
            <li>{{$errors->first('description')}}</li>
        @endif
        <label class="form-label">画像</lavel>
        <input type = "file" name = "path">
        @if ($errors->has('path'))
            <li>{{$errors->first('path')}}</li>
        @endif
        <br><br>
        <input type = "submit" value = "変更" class = "btn btn-primary">
        <a href = "{{ route('number.index') }}"><button type = "button" class = "btn btn-secondary">戻る</button></a>
    </div>
</form>
@endsection
