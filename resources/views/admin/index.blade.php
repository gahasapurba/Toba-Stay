@extends('layouts.admin')

@section('title_dashboard', 'Admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ml-3">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">-</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content ml-3">
        <div class="row">
            <div class="col">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Dashboard</h3>

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
                  Selamat datang admin
                  <p>
                    Selamat datang, penyewa garit
Selamat datang di Sistem informasi TobaStay. Hal-hal yang anda dapatkan setelah masuk pada halaman admin website kami adalah sebagai berikut : Dapat menegelola data diri pada “Ubah data diri”
<br>1. Anda dapat melakukan perubahan pada data diri anda seperti penggantian data diri, foto profil.
<br>2. Dapat memverifikasi daftar akomodasi yang sudah diajukan pada “Kelola Akomodasi”
<br>3. Dapat mengedit pusat bantuan pada “Pusat Bantuan”
                  </p>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
                <!-- /.card-footer-->
              </div>
              <!-- /.card -->
            </div>
            <div class="col">

            </div>
        </div>
      
        
  
      </section>
      <!-- /.content -->
@endsection