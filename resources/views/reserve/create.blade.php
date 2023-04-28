@extends('layouts.parent')
@section('title', 'TOP')
@section('content')
<div class = "text-center"><br>
    <h3>予約画面</h3><br>
</div>
<div class="row">
  <div class="col-md-6 offset-md-3">
    <form method="POST" action="{{ route('reserve.store') }}">
      @csrf
      <input type="hidden" name="plan_id" value="{{ $plan->id }}">
      <input type="hidden" name="date" value="{{ $date }}">
      <div class="form-group">
        <label for="name">お名前</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="tel">電話番号</label>
        <input type="tel" class="form-control" id="tel" name="tel" required>
      </div>
      <button type="submit" class="btn btn-primary">予約する</button>
    </form>
  </div>
</div>
@endsection
