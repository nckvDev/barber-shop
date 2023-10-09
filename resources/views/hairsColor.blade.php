<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link href="{{ asset('favicons.ico') }}" rel="icon" type="image/x-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

  <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_style.min.css" rel="stylesheet"
        type="text/css"/>
  <!-- Scripts -->
  {{--  @vite(['resources/css/style.css', 'resources/js/menu.js'])--}}
  <script src="{{ asset('js/menu.js') }}"></script>
</head>
<body>
<x-header :items="$hairs" :shops="$shops"/>
<div class="pb-10 h-100 my-4">
  {{--  @include('components.header')--}}
  <h1 class="mb-4"><em class="px-4">เทรนด์สีผม</em></h1>
  @if(!$haired->isEmpty())
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      @foreach($haired as $hair)
        <div class="swiper-slide" style="height: 100%;">
          @foreach($hair->getOneImage as $image)
            <div class="image-wrappered">
              <img src="/hair_color_image/{{$image->image}}" alt="{{$hair->sub_title}}"
                   class="w-100 h-400 object-fit-cover">
            </div>
          @endforeach
          <div class="pt-lg-0 pl-5 pr-5  mt-lg-8 mx-auto h-100" style="background-color: #efeefa;">
            <div class="m-0 mb-7 py-5 px-6" style="padding-right: 3rem; padding-left: 3rem">
              @if($hair->category !== 5)
                <span>แกลลอรี่</span>
              @else
                <span>วิดีโอ</span>
              @endif
              <h5 class="font-italic pt-3 mb-0">
                <a href="/hair/{{$hair->id}}" class="text-decoration-none text-dark line-clamp-3">
                  {{ $hair->title }}
                </a>
              </h5>
            </div>

          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="swiper-pagination " style="bottom: -115px"></div>
  @else
    <h3 class="px-4">ไม่มีข้อมูล...</h3>
  @endif

</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  // import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

  let swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 1,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
</body>
</html>
