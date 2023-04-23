@extends('front.layout.layout')
@section('content')
<div class="container">
    <div class="members">
        @foreach($members as $member)
        <div class="member">
            <a href="#">
                <img src="{{asset('images/dummy/dummy.jpg')}}" alt="Member">
                <div class="details">
                    <h4>Generation {{$member['gen_order']}}</h4>
                    <h5 class="name">{{$member['name']}}</h5>
                    <p>?? Years Old</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection