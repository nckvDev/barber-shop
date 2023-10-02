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
<div class="containers containers-sm pb-10 h-100 my-4">
  {{--  @include('components.header')--}}
  <div class="border-bottom border-dark-subtle mb-4">
    <h1 class="title title-spacing">{{$hair->title}}</h1>
    <p class="sub-title mb-6 mb-md-10">
      {{$hair->sub_title}}
    </p>
  </div>
  <section class="_gallery">
    <div
      class="swiper mySwiper swiper-container-thumbs slider-container thumbs-slider d-none d-md-block bg-white swiper-container-initialized swiper-container-horizontal">
      <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
        @foreach($images as $image)
          <div class="swiper-slide slide swiper-slide-visible"
               style="width: 75.625px; margin-right: 15px;">
            @if($hair->category === 0)
              <img src="/hair_image/{{$image->image}}" alt="{{$hair->title}}" width="120px" height="120px"/>
            @elseif($hair->category === 1)
              <img src="/hair_style_image/{{$image->image}}" alt="{{$hair->title}}" width="120px" height="120px"/>
            @elseif($hair->category === 2)
              <img src="/hair_color_image/{{$image->image}}" alt="{{$hair->title}}" width="120px" height="120px"/>
            @elseif($hair->category === 3)
              <img src="/hair_care_image/{{$image->image}}" alt="{{$hair->title}}" width="120px" height="120px"/>
            @elseif($hair->category === 4)
              <img src="/hair_products_image/{{$image->image}}" alt="{{$hair->title}}" width="120px" height="120px"/>
            @endif
          </div>
        @endforeach
      </div>
    </div>

    <div
      class="swiper mySwiper2 swiper-container slider-container main-slider swiper-container-initialized swiper-container-horizontal">
      <div class="swiper-wrapper">
        @foreach($images as $image)
          <div class="swiper-slide slide d-flex flex-column swiper-slide-active" aria-hidden="false"
               style="width: 710px;">
            <div class="slider-img d-flex">
              <figure class="img-wrapper">
                <img src="/hair_image/{{$image->image}}" alt="{{$hair->title}}"/>
              </figure>
            </div>
          </div>
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

  </section>
  <section>
    <div class="mt-2 content">
      <div class="mt-4 mb-0 ">
        <div class="fr-view">
          {!! $hair->description !!}
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  // import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

  let swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });
  let swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
</script>
</body>
</html>
