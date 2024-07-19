<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="author" content="Innocent Tauzeni">
	   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tauzeni.css')}}">
</head>
<body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg bg-primary text-white">
    <div class="container">
      <a class="navbar-brand text-white"  href="#"><b><strong>EMS</strong></b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-lg-5">
          
         
        </ul>
        <ul class="navbar-nav ms-auto">
        @guest
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
        @endguest
        </ul>
      </div>
    </div>
  </nav>
  
<div class="container mt-lg-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-primary text-white">DASHBOARD</li>
                    <li class="list-group-item"><a href="{{route('users')}}"><i
                        class="fa fa-users mr-2"></i>Manage Users</a></li>
                        @can('view equipments')
                        <li class="list-group-item"><a href="{{route('equipments')}}"><i
                            class="fa fa-box mr-2"></i>Manage Equipments</a></li>
                            @endcan
                            <li class="list-group-item"><a href="{{route('assigments')}}"><i
                                class="fa fa-box mr-2"></i>Track Assigments</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
    
</div>
    



    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/all.min.js')}}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script>
    toastr.options = {
        "positionClass": "toast-top-right",
    };
</script>

@if ($message = session('success'))
    <script type="text/javascript">
        toastr.success("{{ $message }}");
    </script>
@endif

@if ($message = session('error'))
    <script type="text/javascript">
        toastr.error("{{ $message }}");
    </script>
@endif
</body>
</html>