@extends('layouts.penyedia')

@section('title_dashboard', 'Menambah akomodasi')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Mengedit akomodasi</h1>
            </div>
            <div class="col-sm-6">  
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/penyedia/akomodasi">Akomodasi</a></li>
                <li class="breadcrumb-item active">Menambah</li>
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
          <h3 class="card-title">Form mengedit akomodasi</h3>

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
            
            <form id="form-edit" action="/penyedia/akomodasi-update/{{ $akomodasi->id_akomodasi }}" method="POST" class="" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="card-body ">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="nama_akomodasi" class="form-control" id="exampleInputEmail1" placeholder="Nama Kontrakan" value="{{$akomodasi->nama_akomodasi}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                  <textarea id="" cols="30" rows="5" class="form-control" name="deskripsi_akomodasi" placeholder="Deskripsi">{{$akomodasi->deskripsi_akomodasi}}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga / hari</label>
                  <input type="number" name="harga_hari" class="form-control" id="exampleInputEmail1" placeholder="Harga / hari" value="{{$akomodasi->harga_hari}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga / bulan</label>
                  <input type="number" name="harga_bulan" class="form-control" id="exampleInputEmail1" placeholder="Harga / bulan" value="{{$akomodasi->harga_bulan}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Stok</label>
                  <input type="number" name="stok" class="form-control" id="exampleInputEmail1" placeholder="Stok" value="{{$akomodasi->stok}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ukuran</label>
                  <input type="text" name="ukuran" class="form-control" id="exampleInputEmail1" placeholder="Format penulisan : 3x3" value="{{$akomodasi->ukuran}}">
                </div>
                
                <div class="form-group mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="terms" class="custom-control-input" id="kontrakan">
                    <label class="custom-control-label" for="kontrakan">Setuju <a href="/pusatbantuan">dengan ketentuan</a>.</label>
                  </div>
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
