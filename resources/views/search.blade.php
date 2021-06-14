@extends('layouts.main')

@section('title', 'Hasil pencarian')

@section('wrapper')

    @if ($lists->isEmpty())
    <div class="container text-center">
        <img src="{{ asset('img/html/error.png') }}" alt="">
    </div>
    @else
    <div class="container-fluid kos-header position-relative">
        <div class="container pt-5 mt-5">
            <h3 class="text-white pt-5"><span class="fa fa-search"></span> Hasil pencarian anda </h3>
            <div class="col mt-4">
                <button type="button" class="btn btn-daftar me-4">Urutan</button>
                <button type="button" class="btn btn-daftar me-4">Harga</button>
                <button type="button" class="btn btn-daftar me-4">Fasilitas</button>
                <button type="button" class="btn btn-daftar me-4">Lokasi</button>
            </div>

            <div class="container position-absolute top-100 start-50 translate-middle shadow jejak">
                <div class="p-jejak ps-2">
                    <p>
                        <a href="{{ '/' }}">Tobastay</a>
                        <span class="ms-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#919191" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                            </svg>
                        </span>
                        <a href="{{ '/kos' }}"></a>
                    </p>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container pt-5 mt-4">
        <div class="row ms-5">
            @foreach ($lists as $list)
            <div class="col col-md-4">
                <a href="{{ ('/kos/detail') }}/{{ ($list->id_akomodasi) }}">
                    <div class="project">
                        <figure class="img-responsive shadow-sm border">
                            <img src="{{ asset('img/res/akomodasi') }}/{{ $list->img_akomodasi }}" height="230px">
                            <figcaption>
                                <span class="project-details">{{ $list->nama_akomodasi }}</span>
                                <span class="project-price"><strong>Rp {{ number_format($list->harga_bulan) }}</strong></span>
                                <span class="project-creator"><span class="fa fa-map-marker"></span> {{ $list->kecamatan }}</span>
                            </figcaption>
                            <span class="actions">
                                <button class="btn btn-warning bnt-action" type="submit" >View </button>
                            </span>
                        </figure>
                    </div>
                </a>
            </div>
            @endforeach
           
            <div class="container mb-4">
                <div class="d-flex justify-content-center">
                    {{$lists->links()}}
                </div>
            </div>
        </div>
    </div>   
    @endif
                                           
@endsection