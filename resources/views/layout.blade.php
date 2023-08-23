<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <body style="background-color: #F7F7F9">

    {{-- navbar start --}}

    <nav class="navbar navbar-expand-lg" style="background-color: #563D7C">
      <div class="container-fluid">
          <a class="navbar-brand text-white" href="{{route('index')}}">EMS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link active fs-5 text-white" aria-current="page" href="{{route('index')}}">Home <i class="bi bi-house"></i></a>
                  </li>
                  @if (auth()->check() && auth()->user()->is_admin == 1)
                  <li class="nav-item">
                      <a class="nav-link active fs-5 text-white" aria-current="page" href="{{ route('admin') }}">Admin <i class="bi bi-person-plus"></i></a>
                  </li>
              @endif
              </ul>
              <div class="collapse navbar-collapse justify-content-end p-0 m-0" id="navbarNav">
                @auth
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <span class="nav-link me-3 text-white   ">Welcome, {{ auth()->user()->name }} <i class="bi bi-person-fill"></i></span>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0 me-2 me-lg-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-2">Logout <i class="bi bi-box-arrow-right"></i></button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
          </div>
      </div>
  </nav>
  

      {{-- navbar end --}}

    <main>
        @yield('content')
    </main>

    
</body>
</html>