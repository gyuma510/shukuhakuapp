@extends('layouts.parent')
@section('title', '宿泊プラン詳細')
@section('content')
<div class = "text-center"><br>
    <h3>宿泊プラン詳細</h3><br>
</div>
<table class="table table-sm table-hover">
    <thead>
        <tr class="text-center bg-light">
            <th>プラン名</th>
            <th>プラン概要</th>
            <th>写真</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center table-cell">
            <td class="align-middle">{{ $plan->plan_name }}</td>
            <td class="align-middle">{{ $plan->description }}</td>
            <td class="align-middle"><img src="{{ asset('images/'.$plan->path) }}" width="100"></td>
        </tr>
    </tbody>
</table>
<div class = "text-center">
    <a href = "{{ route('plan_price.index', ['plan_id' => $plan->id]) }}"><button type = "button" class = "btn btn-info">料金詳細ページ</button></a>
    <a href = "{{ route('plan.index') }}"><button type = "button" class = "btn btn-secondary">戻る</button></a>
</div>
@endsection
