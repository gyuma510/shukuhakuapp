@extends('layouts.parent')
@section('title', '料金設定')
@section('content')
<div class = "text-center"><br>
    <h3>「{{ $plan->plan_name }}」料金設定</h3><br>
</div>
<form action = "{{route('plan_price.store', ['plan_id' => $plan_id])}}" method = "post" class = "text-center">
    @csrf
    <div class = "mb-3">
        <label class="form-label">開始期間</lavel>
        <input type = "date" name = "start_date" value = "{{old('start_date')}}">
        @if ($errors->has('start_date'))
            <li>{{$errors->first('start_date')}}</li>
        @endif
    </div>
    <div class = "mb-3">
        <label class="form-label">終了期間</lavel>
        <input type = "date" name = "end_date" value = "{{old('end_date')}}">
        @if ($errors->has('end_date'))
            <li>{{$errors->first('end_date')}}</li>
        @endif
    </div>
    <div class = "mb-3">
        <label class="form-label">料金</lavel>
        <input type = "number" name = "price">
        @if ($errors->has('price'))
            <li>{{$errors->first('price')}}</li>
        @endif
    </div>
    <input type = "hidden" name = "plan_id" value = "{{ $plan->id }}">
    <input type = "submit" value = "登録" class = "btn btn-primary">
</form>
@endsection
