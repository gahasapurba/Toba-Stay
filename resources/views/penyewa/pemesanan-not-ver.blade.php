@extends('layouts.penyewa')

@section('title_dashboard', 'Pemesanan')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Belum dikonfirmasi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/penyewa/pemesanan/ver">Pemesanan</a></li>
                <li class="breadcrumb-item active">Belum dikonfirmasi</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible col-lg-4">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Berhasil</h5>
          {!! \Session::get('success') !!}
        </div>
        @endif
        <!-- Default box -->
        @foreach ($sewas as $sewa)
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pemesanan - {{$sewa->jenis_akomodasi}}</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-5">
                  <img src="/img/res/akomodasi/{{$sewa->img_akomodasi}}" width="250px" height="250px" class="img-responsive rounded" alt="">
                </div>
                <div class="col-lg-5">
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td>Nama akomodasi</td>
                          <td>{{$sewa->nama_akomodasi}}</td>
                        </tr>
                        <tr>
                          <td>Jenis akomodasi</td>
                          <td>{{$sewa->jenis_akomodasi}}</td>
                        </tr>
                        <tr>
                          <td>Ukuran</td>
                          <td>{{$sewa->ukuran}}</td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>{{$sewa->alamat}}</td>
                        </tr>
                        <tr>
                          <td>Kecamatan</td>
                          <td>{{$sewa->kecamatan}}</td>
                        </tr>
                        <tr>
                          <td>Durasi</td>
                          <td>{{$sewa->durasi}} bulan</td>
                        </tr>
                        <tr>
                          <td>Tanggal masuk</td>
                          <td>{{$sewa->tanggal_masuk}}</td>
                        </tr>
                        <tr>
                          <td>Tanggal keluar</td>
                          <td>{{$sewa->tanggal_keluar}}</td>
                        </tr>
                        <tr>
                          <td>Total Harga</td>
                          <td>Rp {{number_format($sewa->total_harga)}}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <form action="/penyewa/pemesanan/not-ver/{{ $sewa->id_sewa }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><span class="fa fa-times"></span> Batalkan pemesanan</button>
              </form>
            </div>
            <!-- /.card-footer-->
          </div>
        </div>
        @endforeach
        <!-- /.card -->
        <div class="container mb-4 mt-4">
          <div class="d-flex justify-content-center">
              {{$sewas->links()}}
          </div>
      </div>
  
      </section>
      <!-- /.content -->
@endsection