@extends('layouts.penyewa')

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
                <li class="breadcrumb-item"><a href="/penyewa/pembayaran/ver">Pembayaran</a></li>
                <li class="breadcrumb-item active">Menunggu pembayaran</li>
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
        @foreach ($pembayarans as $pembayaran)
        <div class="col-lg-11 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pembayaran</h3>
    
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
                <div class="col-lg-3">
                  <img src="/img/res/akomodasi/{{$pembayaran->img_akomodasi}}" width="300px" height="300px" class="img-responsive rounded" alt="">
                </div>
                <div class="col-lg-5">
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td>Nama akomodasi</td>
                          <td>{{$pembayaran->nama_akomodasi}}</td>
                        </tr>
                        <tr>
                          <td>Durasi</td>
                          <td>{{$pembayaran->durasi}}</td>
                        </tr>
                        <tr>
                          <td>Batas pembayaran</td>
                          <td>{{$pembayaran->batas_pembayaran}}</td>
                        </tr>
                        <tr>
                          <td>Total harga</td>
                          <td>Rp {{number_format($pembayaran->total_harga)}}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="col">
                  <form action="/penyewa/bukti" id="form-pembayaran" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <h5>Upload bukti pembayaran</h5>
                    <input type="hidden" value="{{$pembayaran->id_pembayaran}}" name="id_pembayaran">
                    <div class="form-group">
                      <input type="file" class="form-control" name="img_pembayaran">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="form-control btn btn-primary" value="Upload">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          
            <!-- /.card-footer-->
          </div>
        </div>
        @endforeach
        <!-- /.card -->
        <div class="container mb-4 mt-4">
          <div class="d-flex justify-content-center">
              {{$pembayarans->links()}}
          </div>
      </div>
  
      </section>
      <!-- /.content -->
@endsection