<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{url('css/bundle.css')}}" />

    <!-- ===== Boxicons CSS ===== -->
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>KeluargaBahagia</title>
    <link rel="shortcut icon" href="{{asset('admin/images/KB-Logo.svg') }}" />
  </head>
  <body>
      {{-- Header --}}
      @include('front.layout.header')
      {{-- Content --}}
      @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{url('js/bundle.js')}}"></script> 
  </body>
</html>
