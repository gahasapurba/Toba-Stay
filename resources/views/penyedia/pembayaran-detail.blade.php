@extends('layouts.penyedia')

@section('title_dashboard', 'Pembayaran')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pembayaran</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/penyedia/pembayaran/diterima">Pembayaran</a></li>
                <li class="breadcrumb-item active">Detail</li>
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
        <div class="col-lg-11 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pembayaran {{$pembayaran->nama_akomodasi}}</h3>
    
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
                  <img src="/img/res/akomodasi/{{$pembayaran->img_akomodasi}}" width="200px" height="200px" class="img-responsive rounded" alt="">
                  <img src="/img/res/bukti/{{$pembayaran->img_pembayaran}}" width="200px" height="200px" class="img-responsive rounded mt-5" alt="">
                </div>
                <div class="col-lg-5">
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td>Nama akomodasi</td>
                          <td>{{$pembayaran->nama_akomodasi}}</td>
                        </tr>
                        
                        <tr>
                          <td>Batas pembayaran</td>
                          <td>{{$pembayaran->batas_pembayaran}}</td>
                        </tr>
                        <tr>
                            <td>Harga / bulan</td>
                            <td>Rp {{number_format($pembayaran->harga_bulan)}}</td>
                        </tr>
                        <tr>
                            <td>Durasi</td>
                            <td>{{$pembayaran->durasi}}</td>
                          </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                          <td>Total harga</td>
                          <td>Rp {{number_format($pembayaran->total_harga)}}</td>
                        </tr>
                        
                        
                      </tbody>
                    </table>
                </div>

            </div>
        </div>
            <!-- /.card-body -->
          
            <!-- /.card-footer-->
          </div>
        </div>
     
      
  
      </section>
      <!-- /.content -->
@endsection