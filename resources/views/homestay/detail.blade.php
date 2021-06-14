@extends('layouts.main')

@section('title', 'Detail')

@section('wrapper')
<div class="container-fluid pt-5 position-relative nav-detail">
    <div class="col pt-5 mt-4">
        <div class="container  shadow jejak">
            <div class="p-jejak ps-2">
                <p>
                    <a href="{{ '/' }}">Tobastay</a>
                    <span class="ms-2 me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#919191" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </span>
                    <a href="{{ '/homestay' }}">Homestay</a>
                    <span class="ms-2 me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#919191" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </span>
                    <a href="/homestay/detail/{{ $detail->id_akomodasi }}">{{ $detail->nama_akomodasi }}</a>
                </p>
            </div>
        </div>

        <div class="container pt-5">
            <div class="row">
                <div class="col-lg col-md-6 col-sm-2">
                    <div id="main-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" >
                        <div class="carousel-indicators hidden-xs">
                        <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="2000">
                                <img src= "{{ asset('img/res/akomodasi') }}/{{$detail->img_akomodasi}}" height="450px" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#main-carousel" data-bs-slide="prev">
                            <span class="" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                </svg>
                            </span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#main-carousel" data-bs-slide="next">
                            <span class="" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-5 border shadow-sm me-2 p-4 detail-sewa">
                    <div class="ps-3">
                        <h3>Rp<span class="me-2"></span>{{number_format($detail->harga_hari)}}</h3>
                      <form action="/penyewa/sewa-homestay/{{$detail->id_akomodasi}}" id="sewa" autocomplete="off" method="POST">
                        @csrf
                            <div class="form-group mt-4">
                                <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                              </div>
                              <div class="form-group mt-4">
                                <input type="number" class="form-control" name="durasi" placeholder="Durasi (hari)">
                                <p class="text-muted ms-2 pt-2" style="font-size: 12px">*Isi dalam satuan hari</p>
                              </div>
                              <div class="form-group mt-3 text-center">
                                  <button type="submit" class="btn btn-primary ">Sewa</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <h2>{{$detail->nama_akomodasi}}</h2>
                    <div class="col ms-3 pt-1 detail-pin">
                        <div class="col-md-2">
                            <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row"><img src="{{ asset('img/html/map.png') }}" width="20px" alt=""></th>
                                    <td>Lokasi</td>
                                    <td>{{$detail->kecamatan}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><img src="{{ asset('img/html/room.png') }}" width="25px" alt=""></th>
                                    <td>Sisa Homestay</td>
                                    <td>{{$detail->stok}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><img src="{{ asset('img/html/size.png') }}" width="25px" alt=""></th>
                                    <td>Ukuran Homestay</td>
                                    <td>{{$detail->ukuran}}</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="container mb-5">
            <div class="col-8">
                <!-- Custom Tabs -->
                <div class="card deskripsi">
                  <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3"></h3>
                    <ul class="nav nav-pills ml-auto p-2">
                      <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Deskripsi</a></li>
                      <li class="nav-item ms-3"><a class="nav-link" href="#tab_2" data-toggle="tab">Alamat</a></li>
                      <li class="nav-item ms-3"><a class="nav-link" href="#tab_3" data-toggle="tab">Fasilitas</a></li>
                      <li class="nav-item ms-3"><a class="nav-link" href="#tab_4" data-toggle="tab">Info penyedia</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        {{$detail->deskripsi_akomodasi}}
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_2">
                        {{$detail->alamat}}, {{$detail->kecamatan}}
                      </div>
                      <div class="tab-pane" id="tab_3">
                        {!! html_entity_decode($detail->fasilitas) !!}
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_4">
                        <div class="col-lg-4">
                          <table class="table table-borderless">
                            <tbody>
                              <tr>
                                <td colspan="2"><img src="/img/res/users/{{$detail_penyedia->img_user}}" alt="" width="40px" height="40px" class="img-rounded"></td>
                              </tr>
                              <tr>
                                <td>Nama penyedia</td>
                                <td>{{$detail_penyedia->nama_user}}</td>
                              </tr>
                              <tr>
                                <td>No telepon</td>
                                <td>{{$detail_penyedia->no_hp}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
              </div>
          </div>


    </div>
</div>    
   
<script src="/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/lte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/lte/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/lte/dist/js/demo.js"></script>   
<script>
  $.validator.addMethod("minDate", function(value, element) {
    var curDate = new Date();
    var inputDate = new Date(value);
    if (inputDate > curDate)
        return true;
    return false;
}, "Tidak bisa tanggal yang sudah berlalu"); 

  $(function () {
    $('#sewa').validate({
        rules: {
          date: {
            required: true,
            date: true,
            minDate: true,
          },
          durasi: {
            required: true,
            min: 1,
            max: 365, 
          },
        },
        messages: {
          date: {
            required: "Tidak boleh kosong",
          },
          durasi: {
            required: "Tidak boleh kosong",
            min: "Minimal 1 hari",
            max: "Maximal 1 tahun",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
  });
  </script>                                      
@endsection