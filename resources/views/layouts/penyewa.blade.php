<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title_dashboard')</title>

  <link rel="icon" href="{{ asset('img/html/logo-title.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/lte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">TobaStay</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/res/users/{{auth()->user()->img_user}}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="/penyewa/pengaturan" class="d-block">{{ auth()->user()->nama_user }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="/penyewa" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (auth()->user()->status_user == "not_ver")
            
          @elseif (auth()->user()->status_user == "ver")

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Penyewaan <span class="badge bg-success">{{$sewa}}</span>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/penyewa/pemesanan/ver" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sudah di verifikasi <span class="badge bg-success">{{$sewa_ver}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/penyewa/pemesanan/not-ver" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Belum di verifikasi <span class="badge bg-success">{{$sewa_notver}}</span></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/penyewa/pembayaran" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Pembayaran <span class="badge bg-success">{{$pembayaran_p}}</span>
                <i class="right fas fa-angle-left"></i>
              </p>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/penyewa/pembayaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menunggu bukti <span class="badge bg-success">{{$pembayaran_penyewa}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/penyewa/pembayaran-diproses" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sedang diproses <span class="badge bg-success">{{$pembayaran_penyewa_diproses}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/penyewa/pembayaran-berhasil" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berhasil diproses <span class="badge bg-success">{{$pembayaran_penyewa_berhasil}}</span></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/penyewa/pengaturan" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/penyewa/pengaturan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="/">TobaStay</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@yield('addJS')
<!-- jQuery -->
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
 $(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});

$(function () {
  $('#form-edit-profile').validate({
      rules: {
        nama_user: {
          required: true,
          minlength: 8,
        },
        email: {
          required: true,
        },
        no_hp: {
          required: true,
          minlength: 8,
        },
        gender: {
          required: true,
        },
        img: {
          required: true,
          extension: "jpg|jpeg|png|"
        },
      },
      messages: {
        nama_user: {
          required: "Tidak boleh kosong",
          minlength: "Minimal 8 karakter",
        },
        email: {
          required: "Tidak boleh kosong",
        },
        no_hp: {
          required: "Tidak boleh kosong",
          minlength: "Minimal 8 karakter",
        },
        gender: {
          required: "Tidak boleh kosong",
        },
        img: {
          required: "Tidak boleh kosong",
          extension: "Isi sesuai format gambar"
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

    $('#form-password').validate({
      rules: {
        password: {
          required: true,
          minlength: 8,
        },
      },
      messages: {
        password: {
          required: "Tidak boleh kosong",
          minlength: "Minimal 8 karakter",
        }
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

    $('#form-pembayaran').validate({
      rules: {
        img_pembayaran: {
          required: true,
          extension: "jpg|jpeg|png|"
        },
      },
      messages: {
        img_pembayaran: {
          required: "Tidak boleh kosong",
          extension: "Isi sesuai format gambar"
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

</body>
</html>
