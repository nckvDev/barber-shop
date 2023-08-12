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
{{--  @include('components.header')--}}
  <x-header :items="$hairs" />
  <div class="px-3 pb-3">
    <div style="text-align: center;">
      <h1 class="title">{{$hair->title}}</h1>
      <p class="sub-title">
        {{$hair->sub_title}}
      </p>
    </div>
    <div class="d-flex justify-content-start align-items-center gap-2">
      @foreach($images as $image)
        <div style="width: 143px;height: 180px;object-fit: cover;overflow: hidden;">
          <img src="/hair_image/{{$image->image}}" alt="image">
        </div>
      @endforeach
      {{--      <img src="/images/png/short-hair/short1.png" />--}}
      {{--      <img src="/images/png/short-hair/short2.png" />--}}
      {{--      <img src="/images/png/short-hair/short3.png" />--}}
      {{--      <img src="/images/png/short-hair/short4.png" />--}}
    </div>
    <div class="mt-2 content">
      <p class="mt-4 mb-0">
        {{$hair->description}}
      </p>
    </div>
  </div>
</div>
</body>
</html>
