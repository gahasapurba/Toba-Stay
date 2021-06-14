@extends('layouts.admin')

@section('title_dashboard', 'Pusat bantuan')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ml-3">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pusat Bantuan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/pusatbantuan">Menambah pusat bantuan</a></li>
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
            <div class="col-lg-10">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Menambah pusat bantuan</h3>

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
                    <form id="form-kos" action="/penyedia/akomodasi-tambah/kos" class="" autocomplete="off" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-body ">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Judul pusat bantuan</label>
                            <input type="text" name="nama_akomodasi" class="form-control" id="exampleInputEmail1" placeholder="Nama Kos">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Judul pusat bantuan</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                          
                          
                          <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="terms" class="custom-control-input" id="kos">
                              <label class="custom-control-label" for="kos">Setuju <a href="/pusatbantuan">dengan ketentuan</a>.</label>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
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