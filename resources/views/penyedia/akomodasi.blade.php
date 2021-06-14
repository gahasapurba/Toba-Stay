@extends('layouts.penyedia')

@section('title_dashboard', 'Penyedia')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Daftar akomodasi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/penyedia/akomodasi">Akomodasi</a></li>
                <li class="breadcrumb-item active">Daftar Akomodasi</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content ml-2">
        
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible col-lg-4">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Berhasil</h5>
          {!! \Session::get('success') !!}
        </div>
        @endif
        
        <div class="callout callout-info card col-lg-2">
          <h5>Kos</h5>
        </div>
          <div class="col">
            <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Kos saya</h3>
      
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="card">
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th style="width: 10px">id</th>
                          <th>Nama akomodasi</th>
                          <th>Gambar</th>
                          <th>Kecamatan</th>
                          <th>Alamat</th>
                          <th>Deskripsi</th>
                          <th>Harga/hari</th>
                          <th>Harga/bulan</th>
                          <th>Stok</th>
                          <th>Ukuran</th>
                          <th><span class="fa fa-cog"></span></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kos_ver as $kosver)
                        <tr>
                          <td>{{ $kosver->id_akomodasi }}</td>
                          <td>{{ $kosver->nama_akomodasi }}</td>
                          <td><img src="{{asset('img/res/akomodasi')}}/{{ $kosver->img_akomodasi }}" alt="" width="50px" height="50px"></td>
                          <td>{{ $kosver->kecamatan }}</td>
                          <td>{{ $kosver->alamat }}</td>
                          <td>{{ $kosver->deskripsi_akomodasi }}</td>
                          <td>{{ $kosver->harga_hari }}</td>
                          <td>{{ $kosver->harga_bulan }}</td>
                          <td>{{ $kosver->stok }}</td>
                          <td>{{ $kosver->ukuran }}</td>
                          <td>
                            <div class="row">
                              <div class="col">
                                <a href="/penyedia/akomodasi-edit/{{$kosver->id_akomodasi}}" class="btn btn-info"><span class="fa fa-edit text-white"></span></a>
                              </div>
                              <div class="col">
                                <form action="/penyedia/akomodasi-delete/{{$kosver->id_akomodasi}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.card-footer-->
            </div>
          </div>
        

          <div class="callout callout-success card col-lg-2 mt-5">
            <h5>Kontrakan</h5>
          </div>
          <div class="col">
            <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Kontrakan saya</h3>
      
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="card">
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th style="width: 10px">id</th>
                          <th>Nama akomodasi</th>
                          <th>Gambar</th>
                          <th>Kecamatan</th>
                          <th>Alamat</th>
                          <th>Deskripsi</th>
                          <th>Harga/hari</th>
                          <th>Harga/bulan</th>
                          <th>Stok</th>
                          <th>Ukuran</th>
                          <th><span class="fa fa-cog"></span></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kontrakan_ver as $kontrakanver)
                        <tr>
                          <td>{{ $kontrakanver->id_akomodasi }}</td>
                          <td>{{ $kontrakanver->nama_akomodasi }}</td>
                          <td><img src="{{asset('img/res/akomodasi')}}/{{ $kontrakanver->img_akomodasi }}" alt="" width="50px" height="50px"></td>
                          <td>{{ $kontrakanver->kecamatan }}</td>
                          <td>{{ $kontrakanver->alamat }}</td>
                          <td>{{ $kontrakanver->deskripsi_akomodasi }}</td>
                          <td>{{ $kontrakanver->harga_hari }}</td>
                          <td>{{ $kontrakanver->harga_bulan }}</td>
                          <td>{{ $kontrakanver->stok }}</td>
                          <td>{{ $kontrakanver->ukuran }}</td>
                          <td>
                            <div class="row">
                              <div class="col">
                                <a href="/penyedia/akomodasi-edit/{{$kontrakanver->id_akomodasi}}" class="btn btn-info"><span class="fa fa-edit text-white"></span></a>
                              </div>
                              <div class="col">
                                <form action="/penyedia/akomodasi-delete/{{$kontrakanver->id_akomodasi}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.card-footer-->
            </div>
          </div>

            <div class="callout callout-danger card col-lg-2 mt-5">
              <h5>Homestay</h5>
            </div>
            <div class="col">
              <div class="card collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Homestay saya</h3>
        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th style="width: 10px">id</th>
                            <th>Nama akomodasi</th>
                            <th>Gambar</th>
                            <th>Kecamatan</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <th>Harga/hari</th>
                            <th>Harga/bulan</th>
                            <th>Stok</th>
                            <th>Ukuran</th>
                            <th><span class="fa fa-cog"></span></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($homestay_ver as $homestayver)
                          <tr>
                            <td>{{ $homestayver->id_akomodasi }}</td>
                            <td>{{ $homestayver->nama_akomodasi }}</td>
                            <td><img src="{{asset('img/res/akomodasi')}}/{{ $homestayver->img_akomodasi }}" alt="" width="50px" height="50px"></td>
                            <td>{{ $homestayver->kecamatan }}</td>
                            <td>{{ $homestayver->alamat }}</td>
                            <td>{{ $homestayver->deskripsi_akomodasi }}</td>
                            <td>{{ $homestayver->harga_hari }}</td>
                            <td>{{ $homestayver->harga_bulan }}</td>
                            <td>{{ $homestayver->stok }}</td>
                            <td>{{ $homestayver->ukuran }}</td>
                            <td>
                              <div class="row">
                                <div class="col">
                                  <a href="/penyedia/akomodasi-edit/{{$homestayver->id_akomodasi}}" class="btn btn-info"><span class="fa fa-edit text-white"></span></a>
                                </div>
                                <div class="col">
                                  <form action="/penyedia/akomodasi-delete/{{$homestayver->id_akomodasi}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                  </form>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /.card-footer-->
              </div>
            </div>
          

        
  
      </section>
      <!-- /.content -->
@endsection