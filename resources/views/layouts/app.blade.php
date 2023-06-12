<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gerakan Infak Beras</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div id="app">   
         @auth
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <i class="bi bi-bank"></i> &nbsp; <strong>Gerakan Infak Beras </strong>
                </a>

                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <!-- Dropdown Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Daftar Kontributor
                            </a>
                
                            <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdownDropdown">
                                <a class="dropdown-item" href="/anggotas">Daftar Anggota</a>
                                <a class="dropdown-item" href="/otas">Daftar OTA</a>
                                <a class="dropdown-item" href="/pesantrens">Daftar Pesantren</a>
                            </div>
                        </li>
                        
                        <!-- Dropdown Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Resources
                            </a>
                
                            <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdownDropdown">
                                <a class="dropdown-item" href="/donasi_terimas">Penerimaan</a>
                                <a class="dropdown-item" href="/donasi_penyalurans">Penyaluran</a>
                                <a class="dropdown-item" href="/stok_barangs">Stok Beras</a>
                            </div>
                        </li>
                    </ul> --}}
@endauth
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')
</body>

<script>
    // Mengatur timer pada flash message
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000, // Timer dalam milidetik (ms)
            showConfirmButton: false
        });
    @endif
</script>

</html>
