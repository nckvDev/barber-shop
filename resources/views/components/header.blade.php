<!DOCTYPE html>
<html lang="en">
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
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>

  <!-- Scripts -->
  {{--  @vite(['resources/css/style.css', 'resources/js/menu.js'])--}}
  <script src="{{ asset('js/menu.js') }}"></script>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
    crossorigin="anonymous"
  />

</head>
<body>
<div class="d-flex justify-content-between position-sticky top-0 header-bar bg-white py-2 shadow-sm">
  <header class="header container-xl w-25">
    <div class="box-brand">
      <h1>
        <a href="{{ url('/') }}">
          ไอเดียทรงผม
        </a>
      </h1>
    </div>
{{--    <div class="search">--}}
{{--      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">--}}
{{--        <path--}}
{{--          fill="currentColor"--}}
{{--          d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128c0-70.7 57.2-128 128-128c70.7 0 128 57.2 128 128c0 70.7-57.2 128-128 128z"--}}
{{--        />--}}
{{--      </svg>--}}
{{--    </div>--}}
  </header>
  <nav class="menu-bar container-xl w-75">
    <ul>
      <li class="dropdown">
        <button onclick="myFunction(1)" class="dropbtnOne">ทรงผม</button>
        <div id="myDropdownOne" class="dropdown-content-one">
          <div>
            <h5>ประเภทผม</h5>
            @foreach($items as $item)
              @if($item->category === 0 && $item->sub_category === 0)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
          <div>
            <h5>รูปหน้า</h5>
            @foreach($items as $item)
              @if($item->category === 0 && $item->sub_category === 1)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
        </div>
      </li>
      <li class="dropdown">
        <button onclick="myFunction(2)" class="dropbtnTwo">สไตล์ผม</button>
        <div id="myDropdownTwo" class="dropdown-content-two">
          <div>
            <h5>สไตล์</h5>
            @foreach($items as $item)
              @if($item->category === 1 && $item->sub_category === 0)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
          <div>
            <h5>รูปหน้า</h5>
            @foreach($items as $item)
              @if($item->category === 1 && $item->sub_category === 1)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
        </div>
      </li>
      <li class="dropdown">
        <button onclick="myFunction(3)" class="dropbtnThree">สีผม</button>
        <div id="myDropdownThree" class="dropdown-content-three">
          <div>
            <h5>สีผม</h5>
            @foreach($items as $item)
              @if($item->category === 2 && $item->sub_category === 0)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
          <div>
            <h5>เทรนด์สีผม</h5>
            @foreach($items as $item)
              @if($item->category === 2 && $item->sub_category === 1)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
        </div>
      </li>
      <li class="dropdown">
        <button onclick="myFunction(4)" class="dropbtnFour">การดูแลผม</button>
        <div id="myDropdownFour" class="dropdown-content-four">
          <div>
            <h5>เคล็ดลับดูแลผม</h5>
            @foreach($items as $item)
              @if($item->category === 3 && $item->sub_category === 0)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
          <div>
            <h5>การดูแลทั่วไป</h5>
            @foreach($items as $item)
              @if($item->category === 3 && $item->sub_category === 1)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
        </div>
      </li>
      <li class="dropdown">
        <button onclick="myFunction(5)" class="dropbtnFive">ผลิตภัณฑ์ดูแลผม</button>
        <div id="myDropdownFive" class="dropdown-content-five">
          <div>
            <h5>ประเภทของผลิตภัณฑ์</h5>
            @foreach($items as $item)
              @if($item->category === 4 && $item->sub_category === 0)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
          <div>
            <h5>แบรนด์</h5>
            @foreach($items as $item)
              @if($item->category === 4 && $item->sub_category === 1)
                <a href="{{ url('/hair/'.$item->id) }}">{{$item->title}}</a>
              @endif
            @endforeach
          </div>
        </div>
      </li>
      <li class="dropdown">
        <button onclick="myFunction(6)" class="dropbtnSix">ร้าน</button>
        <div id="myDropdownSix" class="dropdown-content-six">
          <div>
            <a href="{{url('/shop')}}" class="">
              <h5>
                ชื่อร้าน
              </h5>
            </a>
            @foreach($shops as $shop)
              <a href="{{url('/shop/'.$shop->id)}}">{{ $shop->shop_name }}</a>
            @endforeach
          </div>
        </div>
      </li>
    </ul>
  </nav>
</div>

<script>
  // const listMenu = ['ทรงผม', 'สไตล์ผม', 'สีผม', 'การดูแลผม', 'ผลิตภัณฑ์ดูแลผม', 'ร้าน']
  const colors = ['#ADACDF', '#DFACC8', '#ACDFCA', '#DFD4AC', '#DFACAC', '#C6ACDF']

  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content */
  function myFunction(key) {
    switch (key) {
      case 1:
        document.getElementById('myDropdownOne').classList.toggle('show')
        break
      case 2:
        document.getElementById('myDropdownTwo').classList.toggle('show')
        break
      case 3:
        document.getElementById('myDropdownThree').classList.toggle('show')
        break
      case 4:
        document.getElementById('myDropdownFour').classList.toggle('show')
        break
      case 5:
        document.getElementById('myDropdownFive').classList.toggle('show')
        break
      default:
        document.getElementById('myDropdownSix').classList.toggle('show')
        break
    }
  }

  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.dropbtnOne')) {
      let dropdownOne = document.getElementsByClassName('dropdown-content-one')
      let openDropdownOne = dropdownOne[0]
      if (openDropdownOne.classList.contains('show')) openDropdownOne.classList.remove('show')
    }
    if (!event.target.matches('.dropbtnTwo')) {
      let dropdownTwo = document.getElementsByClassName('dropdown-content-two')
      let openDropdownTwo = dropdownTwo[0]
      if (openDropdownTwo.classList.contains('show')) openDropdownTwo.classList.remove('show')
    }
    if (!event.target.matches('.dropbtnThree')) {
      let dropdownThree = document.getElementsByClassName('dropdown-content-three')
      let openDropdownThree = dropdownThree[0]
      if (openDropdownThree.classList.contains('show')) openDropdownThree.classList.remove('show')
    }
    if (!event.target.matches('.dropbtnFour')) {
      let dropdownFour = document.getElementsByClassName('dropdown-content-four')
      let openDropdownFour = dropdownFour[0]
      if (openDropdownFour.classList.contains('show')) openDropdownFour.classList.remove('show')
    }
    if (!event.target.matches('.dropbtnFive')) {
      let dropdownFive = document.getElementsByClassName('dropdown-content-five')
      let openDropdownFive = dropdownFive[0]
      if (openDropdownFive.classList.contains('show')) openDropdownFive.classList.remove('show')
    }
    if (!event.target.matches('.dropbtnSix')) {
      let dropdownSix = document.getElementsByClassName('dropdown-content-six')
      let openDropdownSix = dropdownSix[0]
      if (openDropdownSix.classList.contains('show')) openDropdownSix.classList.remove('show')
    }
  }

</script>
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
