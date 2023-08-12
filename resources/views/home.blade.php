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

  <!-- Scripts -->
  @vite(['resources/css/style.css', 'resources/js/menu.js'])
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

</head>
<body>
<div class="contain">
{{--  <div id="header"></div>--}}
{{--  @include('components.header')--}}
  <x-header :items="$hairs"/>
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="d-flex">
          <div class="position-relative box-image">
            <img src="/images/png/hair1.png" alt="hair"/>
            <img src="/images/png/hair3.png" alt="hair"/>
            <img src="/images/png/hair2.png" alt="hair"/>
          </div>
          <div class="d-flex align-items-center justify-content-start">
            <div class="position-relative" style="width: 260px">
              <p class="m-0 text-center">ไอเดีย ไฮไลต์สีผม สำหรับสาวผมสั้น</p>
              <img
                src="/images/svg/line-1.svg"
                alt="line"
                class="w-100 position-absolute"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex" style="gap: 39px">
          <div class="position-relative box-image-two">
            <img src="/images/png/hair4.png" alt="hair" class="position-absolute"/>
            <img src="/images/png/hair5.png" alt="hair" class="position-absolute"/>
          </div>
          <div class="d-flex align-items-center justify-content-start flex-grow-1">
            <div>
              <p class="m-0 text-center" style="width: 200px">
                เคล็ดลับบำรุงสำหรับผู้หญิงและผู้ชายให้ยาวเร็วกว่าที่เคย
              </p>
              <div class="position-relative box-line">
                <img
                  src="/images/svg/line-2.svg"
                  alt="line"
                  class="position-absolute"
                />
                <img
                  src="/images/svg/line-3.svg"
                  alt="line"
                  class="position-absolute"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex px-2">
          <div class="position-relative box-image-three">
            <img src="/images/png/hair6.png" alt="hair" class="position-absolute"/>
          </div>
          <div class="d-flex align-items-center justify-content-start">
            <div>
              <p class="m-0 text-center px-5">ผลิตภัณฑ์บำรุงเส้นผม</p>
              <img src="/images/svg/line-4.svg" alt="line" class="position-absolute"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev justify-content-start"
      type="button"
      data-bs-target="#carouselExampleDark"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next justify-content-end"
      type="button"
      data-bs-target="#carouselExampleDark"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

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
