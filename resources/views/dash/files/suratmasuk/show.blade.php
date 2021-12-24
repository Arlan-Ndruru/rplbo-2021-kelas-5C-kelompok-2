@extends('layouts.dash.main')

@section('content-main')
<div class="row">
    <div class="col-xl-4">
        <div class="card" data-animation="true">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <a class="d-block blur-shadow-image">
                    <img src="https://ak.picdn.net/shutterstock/videos/1069480645/thumb/11.jpg"
                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
                <div class="colored-shadow"
                    style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);">
                </div>
            </div>
            <div class="card-body text-center">
                <div class="d-flex mt-n6 mx-auto">
                    <i class="bi-calendar2-date"> {{ $smasuk->tanggal_surat }}</i>
                    <a href="{{route('dashSmasukEdit', $smasuk->slug)}}" class="btn btn-link text-info ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Edit">
                        <i class="large material-icons text-lg">edit</i>
                    </a>
                    <form action="{{route('dashSmasukDelete', $smasuk->slug)}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="ms-auto btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Delete" data-container="body" data-animation="true"
                            onclick="return confirm('Delete smasuk, Are you sure?')">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
                <h5 class="font-weight-normal mt-3">
                    <a href="#">{{$smasuk->judul_surat}}</a>
                </h5>
                <p class="mb-0">
                    {{ $smasuk->no_surat }}
                </p>
                <p class="mb-0">
                    {{ $smasuk->perihal }}
                </p>
                <p class="text-sm my-auto">Pengaju: {{$smasuk->user->email}}</p>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer d-flex">
                <i class="material-icons text-lg me-1 my-auto">info_outline</i>
                <p class="font-weight-normal my-auto me-4">{{$smasuk->keterangan}}</p>
                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                <p class="text-sm my-auto">From : {{$smasuk->instance->name}}</p>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <iframe src="{{ asset('storage/'.$smasuk->doc) }}" frameborder="0"></iframe>
    </div>
</div>
<script>
    
</script>
@endsection