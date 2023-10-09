<!DOCTYPE html>

<html>

<head>

  <title>Laravel 10 Autocomplete Search from Database - ItSolutionStuff.com</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

</head>

<body>


<div class="container">

  <h1>Laravel 10 Autocomplete Search from Database - ItSolutionStuff.com</h1>

  {{--  <input class="typeahead form-control" id="search" type="text">--}}
  <!-- Search input -->
  <form>
{{--    <input type="search" class="form-control" placeholder="Find user here" name="search">--}}
    <input
      type="search"
      class="form-control"
      placeholder="Find user here"
      name="search"
      value="{{ request('search') }}"
    >
  </form>
  <ul class="list-group mt-3">
    @forelse($users as $user)
      <li class="list-group-item">{{ $user->title }}</li>
    @empty
      <li class="list-group-item list-group-item-danger">User Not Found.</li>
    @endforelse
  </ul>
</div>

</body>

</html>
