<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
  {{--  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />--}}

  <!-- Froala Editor -->
  <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

  <!-- Swiper -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
  />

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/menu.js'])
  <script src="{{ asset('js/menu.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- CheckBox -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 flex max-w-screen">
  @include('layouts.navigation')

  <div class="w-full">
    <!-- Page Heading -->
    @if (isset($header))
      <header class="bg-white">
        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    @endif

    <!-- Page Content -->
    <main class="h-[calc(100vh-73px)] overflow-y-auto w-full">
      {{ $slot }}
    </main>
  </div>
</div>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
