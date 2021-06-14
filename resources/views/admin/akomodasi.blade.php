@extends('layouts.admin')

@section('title_dashboard', 'Akomodasi')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ml-3">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Daftar akomodasi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Akomodasi</a></li>
                <li class="breadcrumb-item active">Daftar</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content ml-3">
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible col-lg-4">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Berhasil</h5>
          {!! \Session::get('success') !!}
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Maaf </strong> Terdapat masalah di form<br><br>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="col">
            <div class="row">
                @foreach ($akomodasis as $akomodasi) 
                <div class="col-lg-6">
                    <div class="card ">
                        <div class="card-header">
                          <h3 class="card-title">Akomodasi - {{$akomodasi->jenis_akomodasi}}</h3>
        
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
                                    <img src="{{asset('img/res/akomodasi')}}/{{$akomodasi->img_akomodasi}}" alt="" width="300px" height="300px" class="shadow border img-responsive">
                                </div>
                                <div class="col-lg-">
                                    <table class="table table-borderless">
                                        <tbody>
                                          <tr>
                                            <th>Nama akomodasi</td>
                                            <td>{{$akomodasi->nama_akomodasi}}</td>
                                          </tr>
                                          <tr>
                                            <th>Kecamatan</td>
                                            <td>{{$akomodasi->kecamatan}}</td>
                                          </tr>
                                          <tr>
                                            <th>Alamat</td>
                                            <td>{{$akomodasi->alamat}}</td>
                                          </tr>
                                          <tr>
                                            <th>Harga/hari</td>
                                            <td>{{$akomodasi->harga_hari}}</td>
                                          </tr>
                                          <tr>
                                            <th>Harga/bulan</td>
                                            <td>{{$akomodasi->harga_bulan}}</td>
                                          </tr>
                                          <tr>
                                            <th>Deskripsi</td>
                                            <td>{{$akomodasi->harga_bulan}}</td>
                                          </tr>

                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <div class="row text-right mr-auto col-lg-2 float-right">
                                <div class="col"><a href="/admin/verifikasi-akomodasi/{{$akomodasi->id_akomodasi}}" class="btn btn-success"><span class="fa fa-check"></span></a></div>
                                <div class="col"><form action="/admin/verifikasi-not-akomodasi/{{ $akomodasi->id_akomodasi }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><span class="fa fa-times"></span></button>
                                </form></div>
                            </div>
                            
                            
                        </div>
                        <!-- /.card-footer-->
                      </div>
                </div>
                @endforeach
                <div class="container mb-4 mt-4">
                    <div class="d-flex justify-content-center">
                        {{$akomodasis->links()}}
                    </div>
                </div>
            </div>
        </div>
      
        
  
      </section>
      <!-- /.content -->
@endsection