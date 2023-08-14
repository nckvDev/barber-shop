<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>

  <!-- Scripts -->
  {{--  @vite(['resources/css/style.css', 'resources/js/menu.js'])--}}
  <script src="{{ asset('js/menu.js') }}"></script>
</head>
<body>
<div class="contain">
  <x-header :items="$hairs" :shops="$shops"/>
  <div>
    <section class="row my-4">
      <div class="col-4">
        <div>
          <img src="/shop_image/{{$shop->shop_image}}"/>
        </div>
        <div class="d-flex gap-2 mt-4">
          <span class="capsule"> <a href="/salon-detail.html">ภาพรวม</a> </span>
          <span class="capsule"><a href="{{url('/shop/'.$shop->id.'/review') }}">รีวิว</a> </span>
        </div>
      </div>
      <div class="col-8 d-flex align-items-center px-4">
        <div>
          <h3>{{ $shop->shop_name }}</h3>
          <p
            class="{{ $shop->status === 'active' ? 'text-success' : 'text-danger' }}">{{ $shop->status === 'active' ? 'เปิดอยู่' : 'ปิดอยู่' }}
          </p>
        </div>
      </div>
    </section>
    <section class="row mb-5">
      <div class="col">
        @foreach($days as $day)
          <div class="d-flex gap-4 days">
            <p>{{$day}}</p>
            <p>{{$shop->open_hours}}</p>
          </div>
        @endforeach
      </div>
      <div class="col">
        <div>
          <img src="/shop_image/{{$shop->map_image}}"/>
        </div>
      </div>
    </section>
    <section>
      <h3>โทร : {{$shop->phone_number}}</h3>
    </section>
    {{--    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>--}}
    {{--    <script>--}}
    {{--      var map = L.map('map').setView([19.9724483, 99.8607817], 10)--}}
    {{--      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {--}}
    {{--        maxZoom: 18,--}}
    {{--      }).addTo(map)--}}
    {{--      var marker = L.marker([19.9724483, 99.8607817]).addTo(map)--}}
    {{--    </script>--}}
  </div>
</div>
</body>
</html>
