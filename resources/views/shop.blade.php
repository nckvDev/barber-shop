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

  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

  <!-- Scripts -->
  {{--  @vite(['resources/css/style.css', 'resources/js/menu.js'])--}}
  <script src="{{ asset('js/menu.js') }}"></script>
</head>
<body>
<div class="contain">
  <x-header :items="$hairs" :shops="$shops"/>
    <div>
      @foreach($shops as $shop)

      <section class="row mt-4">
        <div class="col-4">
          <div>
            <img src="/shop_image/{{$shop->shop_image}}" />
          </div>
          <div class="d-flex gap-2 mt-4">
            <span class="capsule"> บริการ </span>
            <span class="capsule"> เส้นทาง</span>
            <span class="capsule"> โทร </span>
          </div>
        </div>
        <div class="col-8 d-flex align-items-center px-4">
          <div>
            <h3>
              <a href="{{url('/shop/'.$shop->id)}}">ดรีมเวิลด์ ซาลอน</a>
            </h3>
            <p class="{{$shop->status === 'active' ? 'text-success' : 'text-danger'}}">{{$shop->status === 'active' ? 'เปิดอยู่' : 'ปิดอยู่'}}</p>
          </div>
        </div>
      </section>
      @endforeach
{{--      <section class="row mt-4">--}}
{{--        <div class="col-4">--}}
{{--          <div><img src="/images/png/salon/salon-3.png" /></div>--}}
{{--          <div class="d-flex gap-2 mt-4">--}}
{{--            <span class="capsule"> บริการ </span>--}}
{{--            <span class="capsule"> เส้นทาง</span>--}}
{{--            <span class="capsule"> โทร </span>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-8 d-flex align-items-center px-4">--}}
{{--          <div>--}}
{{--            <h3><a href="/salon-detail.html">Add-Salon</a></h3>--}}
{{--            <p class="text-danger">ปิดอยู่</p>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </section>--}}
    </div>
</div>
</body>
</html>
