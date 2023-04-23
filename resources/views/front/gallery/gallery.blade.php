@extends('front.layout.layout')
@section('content')
<main>
    <div class="container">

    </div>
</main>
<script>window.asset = "{{ asset('/') }}"</script>
<script src="{{url('js/items.js')}}"></script>
<script src="{{url('js/app.js')}}"></script> 
@endsection