@extends('layouts.parent')
@section('title', 'お問合せ')
@section('content')
<div class = "text-center"><br>
    <h3>お問合せフォーム</h3><br>
</div>
<form action = "{{route('contact.store')}}" method = "post" class = "text-center">
    @csrf
    <div class = "mb-3">
        <label class="form-label">名前</lavel>
        <input type = "text" name = "name" value = "{{old('name')}}" class = "form-control">
        @if ($errors->has('name'))
            <li>{{$errors->first('name')}}</li>
        @endif
    </div>
    <div class = "mb-3">
        <label class="form-label">メールアドレス</lavel>
        <input type = "email" name = "email" value = "{{old('email')}}" class = "form-control">
        @if ($errors->has('email'))
            <li>{{$errors->first('email')}}</li>
        @endif
    </div>
    <div class = "mb-3">
        <label class="form-label">お問合せ内容</lavel>
        <textarea name = "content" class = "form-control">{{ old('content') }}</textarea><br>
        @if ($errors->has('content'))
            <li>{{$errors->first('content')}}</li>
        @endif
    </div>
    <input type = "submit" value = "送信" class = "btn btn-primary">
</form>
@endsection
