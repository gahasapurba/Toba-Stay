@extends('layouts.penyedia')

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
                <li class="breadcrumb-item"><a href="/penyedia/pemesanan/ver">Pemesanan</a></li>
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
              <div class="col-lg-2">
                <img src="/img/res/akomodasi/{{$sewa->img_akomodasi}}" width="250px" height="250px" class="img-responsive rounded" alt="">
              </div>
              <div class="col-lg-3">
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
              <div class="col-lg-1 pl-4 border-left">
                <img src="/img/res/users/{{$sewa->img_user}}" class="rounded shadow-sm" width="100px" height="100px" alt="">
              </div>
              <div class="col-lg-4 ">
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>Nama Pembeli</td>
                        <td>{{$sewa->nama_user}}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{$sewa->gender}}</td>
                      </tr>
                      <tr>
                        <td>No Hp</td>
                        <td>{{$sewa->no_hp}}</td>
                      </tr>
                      <tr>
                        <td>Deskripsi untuk penyedia</td>
                        <td><textarea name="" id="" class="form-control" disabled cols="30" rows="10">{{$sewa->deskripsi}}</textarea> </td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="col-lg-8">
              <div class="row">
                <div class="col-lg-2">
                  <a href="/penyedia/pemesanan/ver/{{ $sewa->id_sewa }}" class="btn btn-primary">Terima pesanan</a>
                </div>
                <div class="col-lg-2">
                  <form action="/penyedia/pemesanan/not-ver/{{ $sewa->id_sewa }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Tolak pemesanan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <!-- /.card-footer-->
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