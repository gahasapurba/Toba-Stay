@extends('layouts.admin')

@section('title_dashboard', 'Akun')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ml-3">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Akun</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/akun">Akun</a></li>
                <li class="breadcrumb-item active">-</li>
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
        <div class="row">
            <div class="col-lg-6">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Akun yang sudah di verifikasi</h3>

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
                  <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th style="width: 10px">id</th>
                        <th>Nama user</th>
                        <th>Gambar</th>
                        <th>Role</th>
                        <th><span class="fa fa-cog"></span></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($akuns_ver as $akun)
                      <tr>
                        <td>{{ $akun->id }}</td>
                        <td>{{ $akun->nama_user }}</td>
                        <td><img src="{{asset('img/res/users')}}/{{ $akun->img_user }}" alt="" width="50px" height="50px"></td>
                        <td>{{ $akun->role }}</td>
                        <td>
                          <div class="row">
                            <div class="col">
                              <a href="/admin/akun/detail/{{$akun->id}}" class="btn btn-secondary">detail</a>
                            </div>
                            <div class="col">
                              <form action="/admin/akun/delete/{{$akun->id}}" method="POST">
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
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer-->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Akun yang belum diverifikasi</h3>

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
                  <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th style="width: 10px">id</th>
                        <th>Nama user</th>
                        <th>Gambar</th>
                        <th>Role</th>
                        <th><span class="fa fa-cog"></span></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($akuns_notver as $akun_notver)
                      <tr>
                        <td>{{ $akun_notver->id }}</td>
                        <td>{{ $akun_notver->nama_user }}</td>
                        <td><img src="{{asset('img/res/users')}}/{{ $akun_notver->img_user }}" alt="" width="50px" height="50px"></td>
                        <td>{{ $akun_notver->role }}</td>
                        <td>
                          <div class="row">
                            <div class="col">
                              <a href="/admin/akun/detail/{{$akun_notver->id}}" class="btn btn-secondary">detail</a>
                            </div>
                            <div class="col">
                              <a href="/admin/akun/verifikasi/{{$akun_notver->id}}" class="btn btn-success"><span class="fa fa-check"></span></a>
                            </div>
                            <div class="col">
                              <form action="/admin/akun/delete/{{$akun_notver->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><span class="fa fa-times"></span></button>
                              </form>
                            </div>
                          </div>
                          
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer-->
              </div>
            </div>
        </div>
      
        
  
      </section>
      <!-- /.content -->
@endsection