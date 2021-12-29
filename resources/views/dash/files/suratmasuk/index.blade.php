@extends('layouts.dash.main')

@section('content-main')

    <div class="container-fluid  scrollspy-example" data-bs-spy="scroll" data-bs-target="#navbar-example2"
        data-bs-offset="0" tabindex="0">
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
        <div class="justify-content-center d-flex">
            <div class="col-xl-5">
                <a href="{{route('dashSmasukAdd')}}" class="btn btn-outline-dark btn-lg text-capitalize"><i
                        class="bi bi-person-plus"></i> Ajukan Surat</a>
            </div>
            <div class="form col-md-5">
                <form action="/dashboard/suratmasuk/">
                    <div class="input-group input-group-outline m-4 w-75 is-filled">
                        <label class="form-label">Advance Search</label>
                        <input value="{{ request('search') }}" name="search" type="text" class="form-control" aria-describedby="button-addon2">
                        <input value="{{ request('searchDate') }}" name="searchdate" type="date" class="form-control" aria-describedby="button-addon2">
                        <button type="submit" class="btn btn-primary m-2" type="button" id="button-addon2"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize d-inline ps-3" id="lookinstance"><i
                                    class="bi bi-person"></i> Surat Masuk</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table  align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Surat</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status Surat</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                    <tr>
                                        <td>
                                            <p class="text-secondary text-sm ms-3 mb-0 font-weight-bold">{{$loop->iteration}}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">{{$file->judul_surat}}</h6>
                                                <p class="text-xs text-secondary mb-0">From : {{$file->instance->name}}</p>
                                                <p class="text-xs text-secondary mb-0">Pengaju : {{$file->user->email}}</p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-sm mb-0 font-weight-bold">
                                                @if (Auth::user()->hasRole(['administrator', 'kepalaSekolah']))
                                                    @if($file->status == "kt-uploud"){{-- Kepala TU --}}
                                                        <span class="badge bg-secondary">Belum selesai</span>
                                                    @elseif($file->status == "ksk-uploud"){{-- Kepala Sekolah --}}
                                                        <span class="badge bg-success">Selesai</span>
                                                    @elseif($file->status == "usr-uploud"){{-- User/alumni --}}
                                                        <span class="badge bg-secondary">Belum dicek Staf TU</span>
                                                    @elseif($file->status == "st-uploud"){{-- Staf TU --}}
                                                        <span class="badge bg-secondary">Sedang dikelola Kepala TU</span>
                                                    @else
                                                    <span class="badge bg-warning">Surat Diajukan Admin</span>
                                                    @endif
                                                @elseif(Auth::user()->hasRole(['kepalaTU']))
                                                    @if($file->status == "st-uploud")
                                                        <span class="badge bg-secondary">Belum Dikelola</span>
                                                    @elseif($file->status == "kt-uploud")
                                                        <span class="badge bg-info">Diajukan Kepada Kepala Sekolah</span>
                                                    @else
                                                        <span class="badge bg-danger">Surat Diajukan Admin</span>
                                                    @endif
                                                @elseif(Auth::user()->hasRole(['stafTU']))
                                                    @if($file->status == "st-uploud")
                                                        <span class="badge bg-info">Surat Diajukan Kepada Kepala TU</span>
                                                    @elseif($file->status == "usr-uploud")
                                                        <span class="badge bg-secondary">Surat Belum dibaca Staf</span>
                                                    @else
                                                        <span class="badge bg-danger">Surat Diajukan Admin</span>
                                                    @endif
                                                @endif
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('dashSmasukEdit', $file->slug)}}"
                                                class="btn btn-outline-dark border-0 p-2 font-weight-bold text-md btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                data-container="body" data-animation="true">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{route('dashSmasukShow', $file->slug)}}"
                                                class="btn btn-outline-warning border-0 p-2 font-weight-bold text-md btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"
                                                data-container="body" data-animation="true">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            </a>
                                            <form action="{{route('dashSmasukDelete', $file->slug)}}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button
                                                    class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-container="body" data-animation="true"
                                                    onclick="return confirm('Delete Surat, Are you sure?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pagination-dark justify-content-center">
                            {{$files->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection