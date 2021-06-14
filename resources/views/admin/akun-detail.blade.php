@extends('layouts.admin')

@section('title_dashboard', 'Akun')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ml-3">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Deatil Akun</h1>
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
          <div class="row">

              <div class="col-lg-6 mx-auto">
                  <div class="card">
                    
                    <div class="card-body">
                      <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="rounded" width="200px" height="200px" src="{{ asset('img/res/users') }}/{{$detail->img_user}}">
                        </div>
                        <div class="col-lg-9 mx-auto">
          
                          <ul class="list-group list-group-unbordered mb-3 mt-5">
                            <li class="list-group-item">
                              <b>Nama</b> <a class="float-right">{{$detail->nama_user}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Email</b> <a class="float-right">{{$detail->email}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>No Telepon</b> <a class="float-right">{{$detail->no_hp}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Jenis kelamin</b> <a class="float-right">{{$detail->gender}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Role</b> <a class="float-right">{{$detail->role}}</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                 
                    <!-- /.card-footer-->
                  </div>
                </div>
                @if ($detail->role == "penyedia") 
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                    
                        <div class="card-body">
                          <div class="card-body box-profile">
                            <div class="text-center">
                              
                            </div>
                            <div class="col text-center">
              
                              <h5>Bukti Identitas</h5>
                              <img class="rounded" width="400px" height="480px" src="{{ asset('img/res/users') }}/{{$detail->img_ktp}}">
                            </div>
                          </div>
                        </div>
                     
                        <!-- /.card-footer-->
                      </div>
                </div>
                @endif
          </div>
      
        
  
      </section>
      <!-- /.content -->
@endsection