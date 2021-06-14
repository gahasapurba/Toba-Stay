@extends('layouts.penyedia')

@section('title_dashboard', 'Penyedia')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/penyedia/pengaturan">Pengaturan</a></li>
                <li class="breadcrumb-item active">Profile</li>
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
        <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data diri</h3>
                </div>
                <div class="card-body">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                           src="{{ asset('img/res/users') }}/{{auth()->user()->img_user}}">
                    </div>
                    <div class="col-lg-9 mx-auto">
                      <h3 class="profile-username text-center">{{auth()->user()->nama_user}}</h3>
                      <p class="text-muted text-center">{{auth()->user()->role}}</p>
      
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Email</b> <a class="float-right">{{auth()->user()->email}}</a>
                        </li>
                        <li class="list-group-item">
                          <b>No Telepon</b> <a class="float-right">{{auth()->user()->no_hp}}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Jenis kelamin</b> <a class="float-right">{{auth()->user()->gender}}</a>
                        </li>
                        <a href="/penyedia/pengaturan/edit-profile/{{auth()->user()->id}}" class="btn btn-primary mt-4">edit</a>
                      </ul>
                    </div>
                  </div>
                </div>
             
                <!-- /.card-footer-->
              </div>
            </div>
            <div class="col-lg-4">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Keamanan</h3>
                  </div>
                  <div class="card-body">
                    <form action="/penyedia/pengaturan/edit-password/{{auth()->user()->id}}" id="form-password" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="form-group">
                        <label for="">Password lama</label>
                        <input type="password" value="{{auth()->user()->password}}" disabled class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Password baru</label>
                        <input type="password" value="" name="password" class="form-control">
                      </div>
                      <input type="submit" class="btn btn-primary form-control" value="ganti">
                    </form>
                  </div>
                  <!-- /.card-body -->
                  <!-- /.card-footer-->
                </div>
            </div>
        </div>
        <!-- Default box -->
        
        <!-- /.card -->
  
      </section>
      <!-- /.content -->

<script>
</script>
@endsection