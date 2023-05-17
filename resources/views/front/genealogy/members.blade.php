@extends('front.layout.layout')
@section('content')
@php
Use Carbon\Carbon;    
@endphp
<div class="container">
    <div class="members">
        @foreach($members as $member)
        <div class="member">
            <a href="#">
                @if(!empty($member['image']))
                <img src="{{asset('admin/images/members/'.$member['image'])}}" alt="Member">
                @else
                <img src="{{asset('front/images/dummy/dummy.jpg')}}" alt="Member">
                @endif
                <div class="details">
                    <h4>Generation {{$member['generation']}}</h4>
                    <h5 class="name">{{$member['name']}}</h5>
                    @if(!empty($member['born_date']))
                    <p>{{Carbon::parse($member['born_date'])->age}} Years Old</p>
                    @else
                    <p>?? Years Old</p>
                    @endif
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection