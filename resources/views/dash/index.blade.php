@extends('layouts.dash.main')

@section('content-main')

<div class="row">
    @if (Auth::user()->hasRole(['administrator', 'kepalaSekolah', 'kepalaTU', 'stafTU']))
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">mail</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Surat Masuk</p>
                    <h4 class="mb-0">{{ $smasuk }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="dashboard/suratmasuk#lookSmasuk" class="btn btn-outline-secondary"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">mail</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Surat Keluar</p>
                    <h4 class="mb-0">{{ $skeluar->count() }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="dashboard/suratkeluar#lookSkeluar" class="btn btn-outline-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
    @endif
    @if (Auth::user()->hasRole(['administrator', 'kepalaSekolah', 'receptionist']))
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">people</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Pengguna</p>
                    <h4 class="mb-0">{{$c4}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="dashboard/users#lookPengguna" class="btn btn-outline-info"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
    @endif
    @if (Auth::user()->hasRole(['administrator', 'kepalaSekolah']))
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">people</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Pegawai</p>
                    <h4 class="mb-0">{{$c3}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="dashboard/users#lookPegawai" class="btn btn-outline-dark"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
    @endif
    @if (Auth::user()->hasRole(['user']))
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">markunread_mailbox</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Surat yang saya Uploud</p>
                        <h4 class="mb-0">{{ $Cfiles }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer">
                    <p class="mb-0">
                        <a href="{{ route('userberkasCreate') }}" class="btn btn-outline-secondary">
                            <i class="icon material-icons">note_add</i> Uploud Berkas
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row my-4">
            @if (session()->has('success'))
                <div class="col-xl-5 alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon align-middle">
                        <div class="spinner-grow text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </span>
                    <span class="alert-text text-white"><strong>{{session('success')}}</strong> check it out!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card mt-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize d-inline ps-3" id="lookKepsek"><i class="bi bi-mailbox"></i> Surat
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-striped ">
                            <thead>
                                <tr class="table-dark">
                                    <th>No</th>
                                    <th>Surat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                <tr>
                                    <td>
                                        <p class="text-md text-secondary">
                                            {{ $loop->iteration }}
                                        </p>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0 text-md">{{$file->judul_surat}}</h6>
                                            <p class="text-xs text-secondary mb-0">From : {{$file->user->email}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary text-sm mb-0 font-weight-bold">      
                                            @if ($file->status == "usr-uploud")
                                                <span class="badge bg-secondary">Surat Belum diproses Staf TU</span>    
                                                @elseif($file->status == "ksk-uploud")
                                                <span class="badge bg-success">Selesai</span>    
                                            @else
                                                <span class="badge bg-info">Surat Diproses</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        @if ($file->status =="ksk-uploud")
                                            <a href="{{ asset('storage/' . $file->doc) }}" class="btn btn-outline-dark"><i class="large material-icons">file_download</i> Unduh</a>
                                        @else
                                            <a class="btn btn-outline-dark disabled"><i class="large material-icons">file_download</i> Unduh</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<div class="row my-4">

</div>

@endsection