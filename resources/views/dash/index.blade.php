@extends('layouts.dash.main')

@section('content-main')

<div class="row">
    @if (Auth::user()->hasRole(['administrator', 'kepalaSekolah', 'kepalaTU']))
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">mail</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Surat Masuk</p>
                    <h4 class="mb-0">53</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="#" class="btn btn-outline-secondary"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
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
                    <h4 class="mb-0">153</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="#" class="btn btn-outline-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
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
                        <h4 class="mb-0">#</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="#"
                                class="btn btn-outline-secondary"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="card mt-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize d-inline ps-3" id="lookKepsek"><i class="bi bi-mailbox"></i> Surat
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Surat</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Leges Berkas</td>
                                <td>Selesai</td>
                                <td>
                                    <a href="#" class="btn btn-outline-dark"><i class="large material-icons">file_download</i> Unduh</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
<div class="row my-4">

</div>

@endsection