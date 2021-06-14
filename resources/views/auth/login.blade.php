@extends('layouts.main-no-nav')

@section('title', 'Daftar')

@section('addCSS')
<link rel="stylesheet" href="{{ asset('bootstrap/css/login-style.css') }}">
@endsection

@section('wrapper')
<div class="col-lg-12">
    <div class="sl-container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route('register') }}" method="POST" class="sign-in-form" autocomplete="off">
                    @csrf
                    <h2 class="title">Daftar</h2>
                        <p class="text-muted">sebagai penyedia</p>
                    <div class="form-group">
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" class="@error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="nama_user" value="{{ old('nama_user') }}" required autocomplete="nama_user" autofocus /> 
                        </div>
                        @error('name')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" class="@error('email') is-invalid @enderror" placeholder="Alamat Email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                        </div>
                        @error('email')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-field">
                            <i class="fas fa-phone"></i>
                            <input type="number" class="@error('no_hp') is-invalid @enderror" placeholder="No. Handphone"  name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp"/>
                        </div>  
                            @error('no_hp')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-field">
                            <i class="fas fa-venus-mars"></i>
                            <select name="gender" id="gender" class="" required>
                                <option value="" selected disabled>Jenis kelamin</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                            @error('gender')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="@error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                        </div>
                        @error('password')
                        <span class="text-danger pb-3">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                 
                    <div class="form-group">
                        <p class="social-text">Upload Kartu Tanda Pengenal (KTP) anda</p>
                        <input type="file" name="" id="file" hidden accept="image/png, image/jpg, image/jpeg"/>
                        <button type="button" id="custom-button">Pilih File</button>
                        <span id="custom-text">Tidak ada file terpilih</span>
                    </div>

                    <input type="hidden" name="role" value="penyedia">
                    <input type="submit" class="sl-btn mt-5" value="Daftar" />
                </form>
                    <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                        @csrf
                        <h2 class="title">Daftar</h2>
                        <p class="text-muted">sebagai penyewa</p>
                        <div class="form-group">
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="text" class="@error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="nama_user" value="{{ old('nama_user') }}" required autocomplete="nama_user" autofocus /> 
                            </div>
                            @error('name')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input type="email" class="@error('email') is-invalid @enderror" placeholder="Alamat Email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                            </div>
                            @error('email')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-field">
                                <i class="fas fa-phone"></i>
                                <input type="number" class="@error('no_hp') is-invalid @enderror" placeholder="No. Handphone"  name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp"/>
                            </div>  
                                @error('no_hp')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-field">
                                <i class="fas fa-venus-mars"></i>
                                <select name="gender" id="gender" class="" required>
                                    <option value="" selected disabled>Jenis kelamin</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                                @error('gender')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input type="password" class="@error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                            <span class="text-danger pb-3">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input type="hidden" name="role" value="penyewa">
                        <input type="submit" class="sl-btn mt-5" value="Daftar" />
                    </form>
            </div>
        </div>
        
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Mendaftar sebagai penyewa?</h3>
                    <p>
                      Ayo segera daftar untuk dapatkan akomodasi yang tepat untukmu di TobaStay!
                    </p>
                    <button class="sl-btn transparent" id="sign-up-btn">Klik disini</button>
                  </div>
                <a href="{{ '/' }}"><img src="{{ asset('img/html/logo-regist.png')}}" class="image" alt="" /></a>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Mendaftar sebagai penyedia akomodasi?</h3>
                    <p>
                        Ayo Segera daftar untuk promosikan penyewaan akomodasimu!
                    </p>
                    <button class="sl-btn transparent" id="sign-in-btn">Klik disini</button>
                  </div>
                <a href="{{ '/' }}"><img src="{{ asset('img/html/logo-regist.png')}}" class="image" alt="" /></a>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('bootstrap/js/login.js') }}"></script>
<script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
></script>
@endsection 