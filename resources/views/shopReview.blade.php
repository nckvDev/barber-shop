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
  @vite(['resources/css/app.css', 'resources/js/menu.js'])
  <script src="{{ asset('js/menu.js') }}"></script>
</head>
<body>
<div class="contain">
  <x-header :items="$hairs" :shops="$shops"/>
  <div>
    <section class="row my-4">
      <div class="col-4">
        <div class="shop-image">
          <img src="/shop_image/{{$shop->shop_image}}"/>
        </div>
        <div class="d-flex gap-2 mt-4">
          <span class="capsule"> <a href="/salon-detail.html">ภาพรวม</a> </span>
          <span class="capsule"><a href="/salon-review.html">รีวิว</a> </span>
        </div>
      </div>
      <div class="col-8 d-flex align-items-center px-4">
        <div>
          <h3>{{$shop->shop_name}}</h3>
          <p
            class="{{$shop->status === 'active' ? 'text-success' : 'text-danger'}}">{{$shop->status === 'active' ? 'เปิดอยู่' : 'ปิดอยู่'}}</p>
        </div>
      </div>
    </section>
    @foreach($reviews as $review)
    <section>
      <div class="mb-4">
        <div class="d-flex gap-3 mb-2">
          @if($review->user->profile !== null)
          <img src="/profile_image/{{$review->user->profile}}"/>
          @else
            <div class="avatar">
             <img src="https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/avatars/b5/b5792903c17cade8baf8ecfa533142806169cc52_full.jpg"/>
            </div>
          @endif
          <span>{{$review->user->name}}</span>
        </div>
        <div class="px-5">{{ $review->review_text }}</div>
      </div>
    </section>
    @endforeach
    <hr>
    @guest()
      <div class="d-flex gap-4">
        <a href="{{ route('login') }}">
          <button class="btn btn-success">
            ล็อกอิน
          </button>
        </a>
        <a href="{{ route('register')}}">
          <button class="btn btn-outline-secondary">
            สมัครสมาชิก
          </button>
        </a>
      </div>

    @endguest
    @auth
      <section>
        <form method="POST" action="{{ route('addReview', $shop->id) }}">
          @csrf
          <h4>Comment</h4>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review_text"></textarea>
          <x-input-error :messages="$errors->get('review_text')" class="my-2" />
          <button type="submit" class="btn btn-success mt-4">Review</button>
        </form>
      </section>
      <hr>
      <!-- Authentication -->
      <div class="d-flex justify-content-end">
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-dropdown-link :href="route('logout')"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      </div>
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
