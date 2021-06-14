@extends('layouts.main')

@section('title', 'Home')

@section('addCSS')   
    <link rel="stylesheet" href="{{ asset('bootstrap/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css"
		href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('wrapper')

        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible col-lg-4">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Akun berhasil terdaftar</h5>
        {!! \Session::get('success') !!}
        </div>
        @endif
    <div class="container py-5 pt-5 col-lg">
        <div id="main-carousel" class="carousel slide carousel-fade p-custom col-lg shadow-sm" data-bs-ride="carousel" >
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <a href="/register"><img src= "{{ asset('img/slide/banner1.png') }}" height="450px" class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <a href="/pusatbantuan"><img src= "{{ asset('img/slide/banner2.png') }}" height="450px" class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#main-carousel" data-bs-slide="prev">
                <span class="" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#main-carousel" data-bs-slide="next">
                <span class="" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
                </span>
            </button>
        </div>

        <div class="col-lg-12 mt-5">
            <div class="container">
                <div class="col-lg-4 pt-3 mx-auto border shadow-sm">
                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item ms-2" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" style="width: 120px" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Kos</button>
                        </li>
                        <li class="nav-item ms-2" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" style="width: 120px" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Kontrakan</button>
                        </li>
                        <li class="nav-item ms-2" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" style="width: 120px" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Homestay</button>
                        </li>
                      </ul>
                </div>
                
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h4>Area kos populer</h4>
                        <div class="py-4">
                            <div class="row">
                            <!-- DEMO 2 Item-->
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/kos/balige') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/balige.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Balige</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/kos/laguboti') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/laguboti.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Laguboti</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/kos/porsea') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/porsea.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Porsea</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('kos/') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/white.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h4 class="hover-2-title text-uppercase font-weight-bold mb-0">Semua Area</h4>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h4>Area kontrakan populer</h4>
                        <div class="py-4">
                            <div class="row">
                            <!-- DEMO 2 Item-->
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/kontrakan/balige') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/balige.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Balige</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/kontrakan/laguboti') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/laguboti.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Laguboti</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/kontrakan/porsea') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/porsea.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Porsea</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('kontrakan/') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/white.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h4 class="hover-2-title text-uppercase font-weight-bold mb-0">Semua Area</h4>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h4>Area Homestay populer</h4>
                        <div class="py-4">
                            <div class="row">
                            <!-- DEMO 2 Item-->
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/homestay/balige') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/balige.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Balige</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/homestay/laguboti') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/laguboti.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Laguboti</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('/homestay/porsea') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/porsea.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-bold">Porsea</h3>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 pb-5">
                                    <a href="{{ ('homestay/') }}">
                                        <div class="hover hover-2 text-white shadow area-rounded"><img src="{{ asset('img/html/white.jpg') }}" alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <h4 class="hover-2-title text-uppercase font-weight-bold mb-0">Semua Area</h4>
                                                <p class="hover-2-description mb-3"><span class="fa fa-search"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
            
           
                <!-- DEMO 2-->
            
        </div>

        
        <div class="col">
            <h4>Review penyedia Akomodasi</h4>
            <div class="col mt-4">
                <section id="testimonial" class="">
                    <div class="container">
                        <div class="testimonial-view pt-4">
                            <div class="owl-carousel">
                                <div class="testimonial-box p-3">
                                    <div class="d-flex align-items-center ms-3 mt-4 mb-4">
                                        <img src="{{ asset('img/res/users/1.jpg') }}" alt="" class="user-img me-3">
                                        <div>
                                            <h5 class="mb-0"><b>Penyedia oye</b></h5>
                                            <p class="text-muted mb-0">Ibu kos</p>
                                        </div>
                                    </div>
                                    <p class="ms-3 text-left">Saya sangat senang , kos saya menjadi terpromosikan dengan baik, Terimakasih TobaStay</p>
                                </div>
                                <div class="testimonial-box p-3">
                                    <div class="d-flex align-items-center ms-3 mt-4 mb-4">
                                        <img src="{{ asset('img/res/users/default.png') }}" alt="" class="user-img me-3">
                                        <div>
                                            <h5 class="mb-0"><b>Penyedia oye</b></h5>
                                            <p class="text-muted mb-0">Mami kos</p>
                                        </div>
                                    </div>
                                    <p class="ms-3 text-left">Biasa aja tapi mantap</p>
                                </div>
                                <div class="testimonial-box p-3">
                                    <div class="d-flex align-items-center ms-3 mt-4 mb-4">
                                        <img src="{{ asset('img/res/users/default.png') }}" alt="" class="user-img me-3">
                                        <div>
                                            <h5 class="mb-0"><b>Jovan simare mare</b></h5>
                                            <p class="text-muted mb-0">Bapak kontrakan</p>
                                        </div>
                                    </div>
                                    <p class="ms-3 text-left">Dengan kontrakan saya semakin bersahaja</p>
                                </div>
                                <div class="testimonial-box p-3">
                                    <div class="d-flex align-items-center ms-3 mt-4 mb-4">
                                        <img src="{{ asset('img/res/users/default.png') }}" alt="" class="user-img me-3">
                                        <div>
                                            <h5 class="mb-0"><b>Jonatan sinaga</b></h5>
                                            <p class="text-muted mb-0">Pemilik homestay</p>
                                        </div>
                                    </div>
                                    <p class="ms-3 text-left">Orang orang lebih mengenal homestay saya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @if(\Auth::check() && Auth::user()->role=="penyedia")
        <div class="col mx-auto text-center">
            <button id="bbtn" class="btn-daftar"><span class="fa fa-plus"></span></button>
            
        </div>
        <div class="col-lg-12 text-center" id="toggle">
            <div class="mt-2">
                <h5> Menambah Testimoni</h5>
                <form action="">
                    <div class="form-group">
                        <textarea name="" id="" cols="50" rows="5" style="border: none" class="shadow-sm border"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" value="Tambah" class="btn-masuk">
                    </div>
                </form>
            </div>
        </div>
        @else
        
        @endif
        @guest

        
        @endguest
            


    </div>




<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="{{ asset('bootstrap/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/carousel.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#bbtn").click(function(){
    $("#toggle").toggle();
  });
});
</script>
@endsection

    

    
