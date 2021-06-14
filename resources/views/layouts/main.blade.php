<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('addCSS')
    <link rel="icon" href="{{ asset('img/html/logo-title.png') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="wrapper flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom p-2 fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ '/' }}">
                    <img src="{{ asset('img/html/logo.png') }}" class="logo-nav">
                   
                </a>
                <button class="navbar-toggler toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse mt-1" id="navbarSupportedContent">
                <ul class="navbar-nav ps-4 pe-5">
                    <li class="nav-item dropdown ps-2">
                        <div class="nav-hover">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Akomodasi
                            </a>
                            
                        </div>
                        <ul class="dropdown-menu shadow dropdown-akomodasi-content" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ '/kos' }}">Kos</a></li>
                            <li><a class="dropdown-item" href="{{ '/kontrakan' }}">Kontrakan</a></li>
                            <li><a class="dropdown-item" href="{{ '/homestay' }}">Homestay</a></li>
                        </ul>
                        
                    </li>
                    @guest
                    @if (Route::has('register'))
                    @endif
                    @else
                        @if (auth()->user()->role == "penyedia" && auth()->user()->status_user == "ver")   
                        <li class="nav-item ps-2">
                            <div class="nav-hover ">
                                <a class="nav-link" href="{{ '/penyedia/pemesanan/ver' }}">Pemesanan <span class="badge bg-success">{{$pemesanan_notver}}</span></a>
                            </div>
                        </li>  
                         
                        <li class="nav-item">
                            <div class="nav-hover ">
                                <a class="nav-link" href="{{ '/penyedia/pembayaran/diproses' }}">Pembayaran <span class="badge bg-success">{{$pembayaran_penyedia}}</span></a>
                            </div>
                        </li>
                        @elseif (auth()->user()->role == "penyedia" && auth()->user()->status_user == "not_ver")
                        
                        @endif
                        @if (auth()->user()->role == "penyewa" && auth()->user()->status_user == "ver")   
                        <li class="nav-item ps-2">
                            <div class="nav-hover ">
                                <a class="nav-link" href="{{ '/penyewa/pemesanan/ver' }}">Sewa <span class="badge bg-success">{{$sewa}}</span></a>
                            </div>
                        </li>  
                         
                        <li class="nav-item">
                            <div class="nav-hover ">
                                <a class="nav-link" href="{{ '/penyewa/pembayaran' }}">Pembayaran <span class="badge bg-success">{{$pembayaran_penyewa}}</span></a>
                            </div>
                        </li>   
                        @elseif (auth()->user()->role == "penyewa" && auth()->user()->status_user == "not_ver")
                        
                        @endif
                    @endguest
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="nav-hover ">
                            <a class="nav-link" href="{{ '/pusatbantuan' }}">FAQ</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item ">
                        <form action="">
                            <div class="input-group shadow-sm">
                                <input class="form-control search ps-5" type="search" placeholder="Masukkan nama kota" aria-label="Search">
                                {{-- <select name="select" class="search form-control ps-5" onchange="location = this.value;" id="search" >
                                    <option value ="" disabled selected> Pilih</option>
                                    <option value ="/kos/balige"> Balige</option>
                                    <option value ="/kos/porsea"> Porsea</option>
                                    <option value ="/kos/balige"> Balige</option>
                                    <option value ="/kos/porsea"> Porsea</option>
                                </select> --}}
                                <button class="btn btn-masuk" type="button">Go</button>
                            </div>
                        </form>
                    </li>
                    
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item pe-4">
                            <button class="btn btn-masuk nav-btn" type="submit" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</button>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ '/register' }}" class="btn btn-daftar nav-btn">Daftar</a> 
                            </li>
                            @endif
                            @else
                                @if(auth()->user()->role == "admin")
                                    <li class="nav-item dropdown">
                                        <div class="nav-hover ps-3">
                                            <a href="/admin/pengaturan" class="nav-link dropdown-profile" class="">{{ auth()->user()->nama_user }}<img class="nav-profile-img ms-2 rounded-circle" src="{{ asset('/img/res/users/') }}/{{ auth()->user()->img_user }}" alt="" width="60px"></a>
                                        </div>
                                        
                                        <ul class="dropdown-menu dropdown-profile-content">
                                        <li><a class="dropdown-item" href="/admin/"><span class="fa fa-suitcase ms-2 me-3"></span> Dashboard</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><span class="fa fa-sign-out-alt ms-2 me-3"></span> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if (auth()->user()->role == "penyedia")   
                                <li class="nav-item dropdown">
                                    <div class="nav-hover ps-3">
                                        <a href="/penyedia/pengaturan" class="nav-link dropdown-profile" class="">{{ auth()->user()->nama_user }}<img class="nav-profile-img ms-2 rounded-circle" src="{{ asset('/img/res/users/') }}/{{ auth()->user()->img_user }}" alt="" width="60px"></a>
                                    </div>
                                    <ul class="dropdown-menu dropdown-profile-content">
                                    <li><a class="dropdown-item" href="/penyedia"><span class="fa fa-suitcase ms-2 me-3"></span> Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><span class="fa fa-sign-out-alt ms-2 me-3"></span> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                                @if (auth()->user()->role == "penyewa")   
                                <li class="nav-item dropdown">
                                    <div class="nav-hover ps-3">
                                        <a href="/penyewa/pengaturan" class="nav-link dropdown-profile" class="">{{ auth()->user()->nama_user }}<img class="nav-profile-img ms-2 rounded-circle" src="{{ asset('/img/res/users/') }}/{{ auth()->user()->img_user }}" alt="" width="60px"></a>
                                    </div>
                                    <ul class="dropdown-menu dropdown-profile-content">
                                    <li><a class="dropdown-item" href="/penyewa"><span class="fa fa-suitcase ms-2 me-3"></span> Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><span class="fa fa-sign-out-alt ms-2 me-3"></span> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                    @endguest
                </ul>
              </div>
            </div>
        </nav>
        @yield('wrapper')
    </div>
<footer class="footer">
    <div class="container">
        <div class="left first">
            <h2>About Us</h2>
            <p> Kami adalah penyedia layanan informasi dan pemesanan akomodasi untuk anda.
                <br>Dapatkan informasi kos, kontrakan, dan homestay
                terbaik di Toba hanya di Aplikasi TobaStay</p>
        </div>
        <div class="left second">
            <h2>TobaStay</h2>
            <ul class ="info">
                <li>
                <span><i class="fas fa-info-circle"></i></span>
                <p><a href="{{ ('pusatbantuan') }}"> FAQ</a></p>
                </li>
                <li>
                    <span><i class ="fas fa-envelope" ></i> </span>
                    <p><a href="#">kelompa12@gmail.com</a></p>
                </li>
            </ul>
        </div>
        <div class="left third">
            <img src="{{ asset('img/html/logo-regist.png') }}">
        </div>
    </div>
</footer>
<div class="copyright">
    <p>Copyright &copy; 2021 TobaStay. All Rights Reserved </p>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog pt-4 mt-5">
        <div class="modal-content">
            <div class="col p-4">
                <div class="col float-end">
                    <a href=""><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                </div>
                <div class="col mt-5 text-center">
                    <p class="judul-modal" id="loginModalLabel">Login</p>
                </div>
                <div class="col mt-5 p-3">
                    <form class="login-form" method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus id="email">
                                @error('email')
                                <script>
                                    alert('Data tidak sesuai , silahkan login kembali');
                                </script>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="mb-3 pt-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col text-center pt-4">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        </div>
                        <div class="col pt-4 text-center login-footer">
                            <p>Belum mempunyai akun ? <a href="{{ ('/register') }}">Registrasi disini</a></p>
                            <p><a href="{{ ('/daftar') }}">Lupa password</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
{{-- <script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script> --}}
</body>
</html>