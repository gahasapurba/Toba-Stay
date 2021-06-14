@extends('layouts.main')
@section('addCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.2.0/css/ionicons.min.css" integrity="sha256-F3Xeb7IIFr1QsWD113kV2JXaEbjhsfpgrKkwZFGIA4E=" crossorigin="anonymous" />
@endsection
@section('title', 'Pusat Bantuan')

@section('wrapper')
    <!--Banner-->
    <div class="container-fluid col-lg-12 col-md-12 col-xs-12 banner">
        <div class="container banner-content col-lg-6">
            <div class="text-center">
                <p class="fs-1">
                    Pusat Bantuan TobaStay
                </p>
                <p>
                    Temukan jawaban Anda di sini
                </p>
            </div>
        </div>
    </div>

    <!--Accordion-->
    <div class="my-5 container col-lg-6">
        <h2 class="mb-5">Cara Melakukan Penyewaan</h2>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Mengapa saya harus mendaftarkan akun?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Untuk melakukan penyewaan akomodasi pada TobaStay, Anda harus memiliki akun terlebih dahulu. Untuk mendaftarkan 
                    akun Anda bisa mengunjungi halaman registrasi dan mengisi form registrasi. Selanjutnya, Anda dapat masuk ke TobaStay 
                    dengan melengkapi form login yang tersedia.
                </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Apa yang selanjutnya dapat saya lakukan setelah memiliki akun?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Setelah memiliki akun, Anda dapat memilih menu Akomodasi dan memilih jenis akomodasi apa yang akan Anda sewa. 
                    Anda terlebih dahulu harus mencari lokasi penyewaan yang diinginkan. Kemudian akan ditampilkan akomodasi sesuai 
                    lokasi yang Anda cantumkan dan Anda dapat melihat detail seputar akomodasi tersebut.
                </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Mengapa saya harus melengkapi formulir penyewaan?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Anda dapat melakukan penyewaan akomodasi tersebut dengan melengkapi form penyewaan yang tersedia. Hal ini untuk 
                    memudahkan pemilik akomodasi untuk mengelola data penyewaan dan mempersiapkan akomodasi yang Anda sewa. Setelah 
                    semua sudah lengkap, Anda dapat melanjutkannya dengan pembayaran. Data yang Anda masukkan harus benar-benar valid 
                    agar tidak ada kesalahan dalam proses penyewaan.
                </div>
            </div>
            </div>
        </div>
    </div>

    
  
    <div class="my-5 container col-lg-6">
        <h2 class="mb-5">Cara Melakukan Pembayaran</h2>
        <div class="accordion" id="accordionExample2">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                  Accordion Item #4
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample2">
                <div class="accordion-body">
                  <strong>This is the fourth item's accordion body.</strong> It is shown by default, until the collapse plugin 
                  adds the appropriate classes that we use to style each element. These classes control the overall appearance, 
                  as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding 
                  our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, 
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Accordion Item #5
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample2">
                <div class="accordion-body">
                  <strong>This is the fifth item's accordion body.</strong> It is hidden by default, until the collapse plugin 
                  adds the appropriate classes that we use to style each element. These classes control the overall appearance, 
                  as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding 
                  our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, 
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Accordion Item #6
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    <strong>This is the sixth item's accordion body.</strong> It is hidden by default, until the collapse plugin 
                    adds the appropriate classes that we use to style each element. These classes control the overall appearance, 
                    as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding 
                    our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, 
                    though the transition does limit overflow.
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection