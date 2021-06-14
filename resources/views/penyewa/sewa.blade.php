@extends('layouts.main-no-nav')

@section('title', 'Sewa')

@section('wrapper')
<div class="container-fluid p-2">
    @if (auth()->user()->status_user == "ver")
    <form action="/penyewa/sewa-insert" method="POST" id="form-konfirmasi-sewa" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4">
            <div class="col-lg-7 ">
                <div class="col-lg-6 ms-5">
                    <a href="/kos/detail/{{$akomodasi->id_akomodasi}}" class="text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                    </a>
                    <h2 class="py-4 ms-2"><span class="fa fa-bookmark me-2"></span> Konfirmasi penyewaan</h2>
                    <div class="col ms-5">
                        <h4>Kamar tersedia : {{$akomodasi->stok}}</h4>
                        <h5 class="mt-4">Deskripsi pada penyedia</h5>
                        <div class="form-group">
                            <textarea class="form-control" name="deskripsi_sewa" cols="30" rows="5" placeholder="(Opsional)"></textarea>
                        </div>
                        <div class="mt-4 form-group">
                            <h5>KTP / Kartu Pelajar</h5>
                            <input type="file" class="form-control mt-2" name="img_sewa">
                            <p class="text-muted mt-2" style="font-size: 12px">* KTP / Kartu pelajar dibutuhkan untuk memastikan keamanan transaksi</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-3 mt-5">
                
                <div class="col shadow-sm border mt-5 sewa-detail p-5">
                    <div class="col border-bottom pb-5">
                        <div class="row">
                            <div class="col">
                                <h5>{{$akomodasi->nama_akomodasi}}</h5>
                                <p class="mt-3"><span class="fa fa-map-marker"></span> {{$akomodasi->kecamatan}}</p>
                            </div>
                            <div class="col">
                            <img src="/img/res/akomodasi/{{$akomodasi->img_akomodasi}}" width="150px" height="150px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col border-bottom m-3 pb-3">
                        <div class="row">
                            <h1><span class="fa fa-calendar"></span></h1>
                            <div class="col-lg-5">
                                <p>Tanggal masuk</p>
                                <p>Tanggal keluar</p>
                                <p>Durasi</p>
                                <input type="hidden" value="{{$akomodasi->id_akomodasi}}" name="id_akomodasi">
                                <input type="hidden" value="{{$tanggal_masuk}}" name="tanggal_masuk">
                                <input type="hidden" value="{{$tanggal_keluar}}" name="tanggal_keluar">
                                <input type="hidden" value="{{$akomodasi->harga_bulan*$durasi}}" name="total_harga">
                                <input type="hidden" value="{{$durasi}}" name="durasi">
                            </div>
                            <div class="col">
                                <p>: {{$tanggal_masuk}}</p>
                                <p>: {{$tanggal_keluar}}</p>
                                <p>: {{$durasi}} bulan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col border-bottom m-3 pb-3">
                        <div class="row">
                            <h1><span class="fa fa-money-check"></span></h1>
                            <div class="col-lg-5">
                                <p>Harga / bulan</p>
                                <p>Total harga</p>
                            </div>
                            <div class="col">
                                <p>: Rp {{number_format($akomodasi->harga_bulan)}}</p>
                                <p>: Rp {{number_format($akomodasi->harga_bulan*$durasi)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-masuk" name="sewa" value="ajukan sewa">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @elseif (auth()->user()->status_user == "not_ver")
    <div class="mt-5 ms-5 col-lg-4 p-5 bg-light shadow">
        <a href="/kos/detail/{{$akomodasi->id_akomodasi}}" class="text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>
        <h5 class="mt-2">Mohon Maaf</h5>
        <p>Untuk melakukan penyewaan , akun harus dikonfirmasi oleh admin</p>
    </div>
    @endif  
        
</div>

@endsection