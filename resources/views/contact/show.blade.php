@extends('layouts.parent')
@section('title', 'お問合せ詳細')
@section('content')
<div class = "text-center"><br>
    <h3>お問合せ詳細</h3><br>
</div>
<table class = "table table-sm table-hover">
    <thead>
        <tr class = "text-center bg-info">
            <th>名前</th>
            <th>メールアドレス</th>
            <th>お問合せ内容</th>
            <th>投稿日</th>
            <th>ステータス</th>
        </tr>
    </thead>
        <tbody>
            <tr class = "text-center table-cell">
                <td class = "align-middle">{{ $contact->name }}</td>
                <td class = "align-middle">{{ $contact->email }}</td>
                <td class = "align-middle">{{ $contact->content }}</td>
                <td class = "align-middle">{{ date('Y/m/d  H:m', strtotime($contact->created_at)) }}</td>
                @if ($contact->status)
                    <form action = "{{ route('contact.status', $contact->id) }}" method = "post">
                        @csrf
                        @method('DELETE')
                        <td class = "align-middle"><input type = "submit" value = "対応済" class = "btn btn-success"></td>
                    </form>
                @else
                    <form action = "{{ route('contact.status', $contact->id) }}" method = "post">
                        @csrf
                        <td class = "align-middle"><input type = "submit" value = "未対応" class = "btn btn-outline-success"></td>
                    </form>
                @endif
            </tr>
        </tbody>
</table>
<div class = "text-center">
    <a href = "{{ route('contact.index') }}"><button type = "button" class = "btn btn-secondary">戻る</button></a>
</div>
@endsection
