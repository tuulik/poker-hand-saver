@extends('app')

@section('head')
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
        var CARDS = ["10c", "Ac", "2c", "3c", "4c", "5c", "6c", "7c", "8c", "9c", "Jc", "Kc", "Qc", "10d", "Ad", "2d",
            "3d", "4d", "5d", "6d", "7d", "8d", "9d", "Jd", "Qd", "Kq", "10h", "Ah", "2h", "3h", "4h", "5h", "6h",
        "7h", "8h", "9h", "Jh", "Qh", "Kh", "10s", "As", "2s", "3s", "4s", "5s", "6s", "7s", "8s", "9s", "Js", "Qs",
        "Ks"];

        $(document).ready(function() {
            var handHTML = $("div.hand");
            var hand = handHTML.prop('outerHTML');

            for(var i = 0; i < CARDS.length; i++) {
                var re = new RegExp(CARDS[i], 'g');
                hand = hand.replace(re, "<img src='" + "/poker-hand-saver/public/cards/" + CARDS[i] + ".gif" + "'>");
                $("")
            }

            $("div.hand").html(hand);
        });
    </script>
@endsection

@section('content')

    <p>User:<br>
        @if($hand->user->avatar != null)
            <img src="{{ Croppa::url(asset('/avatars/' . $hand->user->avatar), 100, 100) }}">
        @else
            <img src="{{ Croppa::url(asset('/avatars/default.png'), 100, 100) }}">
        @endif
        <br><a href="{{url('view-user/' . $hand->user->id)}}">{{$hand->user->name }}</a> {{ $hand->user->avatar }} <br>
        Hand: <div class="hand">{{$hand->hand}}</div> <br>Description: <div class="description">{!!$hand->description!!}</div>
        @if($editHand == true)
            <br><a href="{{$hand->id . '/edit'}}">Edit hand</a>
        @endif
    </p>
@endsection