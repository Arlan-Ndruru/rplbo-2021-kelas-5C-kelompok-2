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
        <a href="{{route('dashInstanceAdd')}}" class="btn btn-outline-dark btn-lg w-25 text-capitalize col-xl-2"><i
                class="bi bi-person-plus"></i> Add</a>
        <div class="row">
            <div class="col-xl-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize d-inline ps-3" id="lookinstance"><i
                                    class="bi bi-person"></i> Instance</h6>
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
                                            Instance</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No Hp</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instances as $instance)
                                    <tr>
                                        <td>
                                            <p class="text-secondary text-sm ms-3 mb-0 font-weight-bold">{{$loop->iteration}}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">{{$instance->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$instance->alamat}}</p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-sm mb-0 font-weight-bold">{{$instance->no_hp}}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('dashInstanceEdit', $instance->slug)}}"
                                                class="btn btn-outline-dark border-0 p-2 font-weight-bold text-md btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                data-container="body" data-animation="true">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{route('dashInstanceShow', $instance->slug)}}"
                                                class="btn btn-outline-warning border-0 p-2 font-weight-bold text-md btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"
                                                data-container="body" data-animation="true">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            </a>
                                            <form action="{{route('dashInstanceDelete', $instance->slug)}}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button
                                                    class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-container="body" data-animation="true"
                                                    onclick="return confirm('Delete instance, Are you sure?')">
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
                            {{$instances->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection