@extends('layouts.parent')
@section('title', '料金設定編集')
@section('content')
<div class = "text-center"><br>
    <h3>「{{ $plan->plan_name }}」料金設定編集</h3><br>
</div>
<form action = "{{route('plan_price.update', [$plan->id, $plan_price->id]) }}" method = "post" class = "text-center">
    @csrf
    <div class = "mb-3">
    @method('PUT')
        <input type = "hidden" name = "id" value = "{{ $plan_price->id }}">
        <input type = "hidden" name = "plan_id" value = "{{ $plan_price->plan_id }}">
        <label class="form-label">開始期間</lavel>
        <input type = "date" name = "start_date" value = "{{ old('start_date', $plan_price->start_date) }}">
        @if ($errors->has('start_date'))
            <li>{{$errors->first('start_date')}}</li>
        @endif
        <label class="form-label">終了日</lavel>
        <input type = "date" name = "end_date" value = "{{ old('end_date', $plan_price->end_date) }}">
        @if ($errors->has('end_date'))
            <li>{{$errors->first('end_date')}}</li>
        @endif
        <label class="form-label">料金</lavel>
        <input type = "number" name = "price" value = "{{ old('price', $plan_price->price) }}">円
        @if ($errors->has('price'))
            <li>{{$errors->first('price')}}</li>
        @endif
    </div>
    <input type = "submit" value = "変更" class = "btn btn-primary">
    <a href = "{{ route('plan_price.index', $plan->id) }}"><button type = "button" class = "btn btn-secondary">戻る</button></a>
</form>
@endsection
