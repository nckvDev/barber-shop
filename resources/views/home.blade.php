<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link href="{{ asset('favicons.ico') }}" rel="icon" type="image/x-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link
    href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>

  <!-- Scripts -->
  {{--  @vite(['resources/css/style.css', 'resources/js/menu.js'])--}}
  <script src="{{ asset('js/menu.js') }}"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
    crossorigin="anonymous"
  />
  <!-- Swiper -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
  />

</head>
<body>
<div>
  {{--  <div id="header"></div>--}}
  {{--  @include('components.header')--}}
  <x-header :items="$hairs" :shops="$shops"/>
  <div class="mb-4">
    <div class="swiper">
      <!-- Slider main container -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($hairTop as $hair)
          <div class="swiper-slide">
            @foreach($hair->getOneImage as $image)
              <div class="image-wrapper">
                <img src="/hair_image/{{$image->image}}" alt="{{$hair->sub_title}}"
                     class="w-100 h-100 object-fit-cover">
              </div>
            @endforeach
            <div class="text-wrapper text-md-center p-7 pt-lg-0 mt-lg-8 mx-auto">
              <h2 class="title font-italic m-0 mb-7">
                <a href="/hair/{{$hair->id}}">
                  {{ $hair->title }}
                </a>
              </h2>
              <p class="font-weight-light mb-4">
                {{ $hair->sub_title }}
              </p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{--  hero-buttons --}}
    <div class="hero-buttons d-flex align-items-center justify-content-center mx-auto px-7">
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev hero-prev d-flex align-items-center swiper-button-disabled"></div>
      <div class="swiper-button-next"></div>

      <!-- If we need scrollbar -->
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
  <div class="mb-4 container">
    <h1 class="mb-4"><em>เทรนด์ทรงผม</em></h1>
    <div>
      <div class="row">
        @foreach($hairTop as $hair)
          <div class="col-4 mb-4">
            <div class="p-3 card-gallery">
              @foreach($hair->getOneImage as $image)
                <div class="ratio ratio-16x9 mb-3">
                  <img src="/hair_image/{{$image->image}}" alt="{{$hair->sub_title}}"
                       class="w-100 h-100 object-fit-cover rounded-1">
                </div>
              @endforeach
              <span>แกลลอรี่</span>
              <p class="fs-4 mb-0">
                <a href="/hair/{{$hair->id}}" class="text-decoration-none text-dark">
                  {{ $hair->title }}
                </a>
              </p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper', {
    speed: 400,
    spaceBetween: 100,
    // Optional parameters
    loop: true,
    // autoplay: true,
    // effect: 'cards',
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    }

  });
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
  crossorigin="anonymous"
></script>
<script
  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
  crossorigin="anonymous"
></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
  integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
  crossorigin="anonymous"
></script>
</body>
</html>
