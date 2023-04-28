@extends('layouts.parent')
@section('title', '宿泊プラン詳細')
@section('content')
<div class = "text-center"><br>
    <h3>宿泊プラン詳細</h3><br>
</div><div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">{{ $plan->plan_name }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $plan->room->room_name }}</h5>
                    <img src="{{ asset('images/'.$plan->path) }}" class="img-fluid mb-3">
                    <p class="card-text">{{ $plan->description }}</p>
                    <p class="card-text">部屋名：{{ $plan->room->room_name }}</p>
                    <p class="card-text">料金：{{ $plan->planPrices->min('price') }}円〜</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="calendar"></div>
        </div>
    </div>
</div>
@endsection
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
$(document).ready(function() {
    // カレンダー初期化
    $('#calendar').fullCalendar({

        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        defaultView: 'month',
        defaultDate: new Date(),
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events : {!! json_encode($vacancy) !!},
        dayRender: function(date, cell) {
    cell.append('<div style="text-align:center">'+'<br><a href="#">予約枠数</a><br><a href="#">料金</a></div>');
}
    });
});

</script>
