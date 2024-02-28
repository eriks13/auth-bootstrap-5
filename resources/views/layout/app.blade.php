
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    @yield('style')

  </head>
  <body class="d-flex flex-column h-100">
  
    <header>
      <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white shadow-sm lh-lg">
        <div class="container">
          <a class="navbar-brand roboto-medium" href="{{ route('dashboard') }}">
            <i class="bi bi-exclude me-2"></i>
            {{ __('Simple-ui') }}
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-distribute-vertical"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('login'))
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              @auth
              <li class="nav-item">
                <a class="nav-link fs-ui" href="{{ route('simple.index') }}">{{ __('Siple Table') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-ui" href="{{ route('form.index') }}">{{ __('Siple Form') }}</a>
              </li>
              <li class="nav-item dropdown" id="uiDropdown">
                <a class="nav-link dropdown-toggle fs-ui" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item fs-ui" href="{{ route('profile.show', Auth::user()->id) }}">
                      <i class="bi bi-person me-2"></i>
                      {{ __('Seting Profile') }}
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <a class="dropdown-item fs-ui" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                      <i class="bi bi-box-arrow-left me-2"></i>
                      {{ __('Logout') }}
                    </a>
                    <form id="logoutform" action="{{ route('logout') }}" method="POST">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link fs-ui" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link fs-ui" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @endauth
            </ul>
            @endif
          </div>
        </div>
      </nav>
    </header>

    <main class="flex-shrink-0">
      <div class="container" id="contain-ui">
        @yield('content')
      </div>
    </main>

  <footer class="footer mt-auto py-3 bg-white">
    <div class="container">
      <span class="fs-ui">© 2024 Simple-ui, Inc. All rights reserved</span>
    </div>
  </footer>


  <script src="{{ asset('https://code.jquery.com/jquery-3.7.1.js') }}"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js') }}" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="{{ asset('asset/js/main.js') }}"></script>

  @yield('script')
  </body>
</html>
