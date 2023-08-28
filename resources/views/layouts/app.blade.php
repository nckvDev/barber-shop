<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link
    href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />--}}

  <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/menu.js'])
  <script src="{{ asset('js/menu.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
  @include('layouts.navigation')

  <!-- Page Heading -->
  @if (isset($header))
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
  @endif

  <!-- Page Content -->
  <main>
    {{ $slot }}
  </main>
</div>
</body>
</html>
