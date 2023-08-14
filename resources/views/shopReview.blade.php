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
          <span class="capsule"><a href="/salon-review.html">รีวิว</a> </span>
        </div>
      </div>
      <div class="col-8 d-flex align-items-center px-4">
        <div>
          <h3>ดรีมเวิลด์ ซาลอน</h3>
          <p class="text-success">เปิดอยู่</p>
        </div>
      </div>
    </section>
    @guest()
      <h1>login</h1>
      <h1>register</h1>
      <section>
        <div class="mb-4">
          <div class="d-flex gap-3 mb-2">
            <img src="/images/png/salon/profile1.png"/>
            <span>Somchai</span>
          </div>
          <div class="px-5">บริการดีมาก ๆ ประทับใจสุด</div>
        </div>
      </section>
    @endguest
    @auth
      <section>
        <div class="mb-4">
          <div class="d-flex gap-3 mb-2">
            <img src="/images/png/salon/profile1.png"/>
            <span>Somchai</span>
          </div>
          <div class="px-5">บริการดีมาก ๆ ประทับใจสุด</div>
        </div>
      </section>
      <section>
        <h4>Comment</h4>
        <textarea rows="4" name="comment"/>
      </section>
    @endauth
{{--    <section>--}}
{{--      <div class="mb-4">--}}
{{--        <div class="d-flex gap-3 mb-2">--}}
{{--          <img src="/images/png/salon/profile1.png"/>--}}
{{--          <span>Somchai</span>--}}
{{--        </div>--}}
{{--        <div class="px-5">บริการดีมาก ๆ ประทับใจสุด</div>--}}
{{--      </div>--}}
{{--      <div class="mb-4">--}}
{{--        <div class="d-flex gap-3 mb-2">--}}
{{--          <img src="/images/png/salon/profile2.png"/>--}}
{{--          <span>รัตนาวรรณ ทองเอก</span>--}}
{{--        </div>--}}
{{--        <div class="px-5">ช่างแนะนำดีมากค่ะ</div>--}}
{{--      </div>--}}
{{--      <div>--}}
{{--        <div class="d-flex gap-3 mb-2">--}}
{{--          <img src="/images/png/salon/profile3.png"/>--}}
{{--          <span>panupong</span>--}}
{{--        </div>--}}
{{--        <div class="px-5">ราคาเป็นกันเอง แนะนำ</div>--}}
{{--      </div>--}}
{{--    </section>--}}
  </div>
</div>
</body>
</html>
