@extends('layouts.penyewa')

@section('title_dashboard', 'Mengedit data diri')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Mengedit data diri</h1>
            </div>
            <div class="col-sm-6">  
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/penyewa/pengaturan">Pengaturan</a></li>
                <li class="breadcrumb-item active">Mengedit data diri</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
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

          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div> 
          @endif
    

       <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form mengedit data diri</h3>

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
          <div class="card card-primary">
            
            <!-- /.card-header -->
            <!-- form start -->
            
            <form id="form-edit-profile" action="/penyewa/pengaturan/update-profile/{{ $user->id }}" method="POST" class="" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="card-body ">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="nama_user" class="form-control" id="exampleInputEmail1" placeholder="Nama baru" value="{{$user->nama_user}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email baru" value="{{$user->email}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No Hp</label>
                  <input type="number" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="No.hp Baru" value="{{$user->no_hp}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis kelamin</label>
                  <select name="gender" id="" class="custom-select">
                    <option selected disabled value="">Jenis kelamin</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                  </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="file" name="img" class="form-control" id="exampleInputEmail1">
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.card-footer-->
      </div>
      </section>
      <!-- /.content -->
@endsection
