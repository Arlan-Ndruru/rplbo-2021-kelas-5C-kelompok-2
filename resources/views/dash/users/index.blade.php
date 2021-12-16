@extends('layouts.dash.main')

@section('content-main')

<div class="row" id="navbar-example2">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Kepala Sekolah</p>
                    <h4 class="mb-0">{{$count_kepsek}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="#lookKepsek"
                            class="btn btn-outline-secondary"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Kepala Tata Usaha</p>
                    <h4 class="mb-0">{{$count_TU}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="#lookKepTU"
                            class="btn btn-outline-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">people</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Pegawai</p>
                    <h4 class="mb-0">{{$count_stafTU}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="#lookPegawai"
                            class="btn btn-outline-dark"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">people</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Pengguna</p>
                    <h4 class="mb-0">{{$count_user}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="#lookPengguna"
                            class="btn btn-outline-info"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 scrollspy-example" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
    <a href="{{route('dashUserAdd')}}" class="btn btn-outline-dark btn-lg w-25 text-capitalize col-xl-2"><i class="bi bi-person-plus"></i> Add</a>
    @if (session()->has('success'))
    {{-- <div class="alert alert-success col-xl-5 d-inline" role="alert">
        
        {{session('success')}}
    </div> --}}
    <div class="col-xl-5 d-inline alert alert-success alert-dismissible fade show" role="alert">
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
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize d-inline ps-3" id="lookKepsek"><i class="bi bi-person"></i> Kepala Sekolah</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        No Hp</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Bagian</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kepalasekolah as $kepsek)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if ($kepsek->foto)
                                                <img src="{{asset('storage/' . $kepsek->foto)}}" class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{$kepsek->email}}">
                                                @else
                                                <img src="https://static.thenounproject.com/png/586523-200.png"
                                                class="avatar avatar-sm me-3 border-radius-lg" alt="{{$kepsek->email}}">    
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$kepsek->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$kepsek->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary text-xs mb-0 font-weight-bold">0{{$kepsek->no_hp}}</span>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">Kepala Sekolah</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($kepsek->status === 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{route('dashUserEdit', $kepsek->email)}}" class="btn btn-outline-dark border-0 p-2 font-weight-bold text-md btn-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-container="body" data-animation="true">
                                            <i class="bi bi-pencil-square"></i> 
                                        </a>
                                        <a href="{{route('dashUserShow', $kepsek->email)}}" class="btn btn-outline-warning border-0 p-2 font-weight-bold text-md btn-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" data-container="body" data-animation="true">
                                            <i class="bi bi-eye-fill"></i> 
                                        </a>
                                        </a>
                                        <form action="{{route('dashUserDelete', $kepsek->email)}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete" data-container="body" data-animation="true"
                                                onclick="return confirm('Delete?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3" id="lookKepTU"><i class="bi bi-person"></i> Kepala TU</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        No Hp</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Bagian</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kepalaTU as $kepTU)                                    
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if ($kepTU->foto)
                                                    <img src="{{asset('storage/' . $kepTU->foto)}}" class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{$kepTU->email}}">
                                                @else
                                                    <img src="https://static.thenounproject.com/png/586523-200.png"
                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="{{$kepTU->email}}">    
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$kepTU->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$kepTU ->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary text-xs mb-0 font-weight-bold">0{{$kepTU ->no_hp}}</span>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">Kepala Tata Usaha</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($kepTU->status === 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{route('dashUserEdit', $kepTU->email)}}"
                                            class="btn btn-outline-dark border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit" data-container="body" data-animation="true">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{route('dashUserShow', $kepTU->email)}}" class="btn btn-outline-warning border-0 p-2 font-weight-bold text-md btn-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" data-container="body" data-animation="true">
                                            <i class="bi bi-eye-fill"></i> 
                                        </a>
                                        </a>
                                        <form action="{{route('dashUserDelete', $kepTU->email)}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete" data-container="body" data-animation="true"
                                                onclick="return confirm('Delete?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3" id="lookPegawai"><i class="bi bi-people"></i> Pegawai</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        No Hp</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stafTU as $sTU)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if ($sTU->foto)
                                                    <img src="{{asset('storage/' . $sTU->foto)}}" class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{$sTU->email}}">
                                                @else
                                                    <img src="https://static.thenounproject.com/png/586523-200.png"
                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="{{$sTU->email}}">    
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$sTU->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$sTU->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary text-xs mb-0 font-weight-bold">0{{$sTU->no_hp}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($sTU->status === 1)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{route('dashUserEdit', $sTU->email)}}"
                                            class="btn btn-outline-dark border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit" data-container="body" data-animation="true">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{route('dashUserShow', $sTU->email)}}" class="btn btn-outline-warning border-0 p-2 font-weight-bold text-md btn-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" data-container="body" data-animation="true">
                                            <i class="bi bi-eye-fill"></i> 
                                        </a>
                                        </a>
                                        <form action="{{route('dashUserDelete', $sTU->email)}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete" data-container="body" data-animation="true"
                                                onclick="return confirm('Delete?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination pagination-info justify-content-center">
                        {{$stafTU->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3" id="lookPengguna"><i class="bi bi-people"></i> Pengguna</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        No Hp</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if ($user->foto)
                                                    <img src="{{asset('storage/' . $user->foto)}}" class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{$user->email}}">
                                                @else
                                                    <img src="https://static.thenounproject.com/png/586523-200.png"
                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="{{$user->email}}">    
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary text-xs mb-0 font-weight-bold">0{{$user->no_hp}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($user->status === 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{route('dashUserEdit', $user->email)}}"
                                            class="btn btn-outline-dark border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit" data-container="body" data-animation="true">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{route('dashUserShow', $user->email)}}" class="btn btn-outline-warning border-0 p-2 font-weight-bold text-md btn-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" data-container="body" data-animation="true">
                                            <i class="bi bi-eye-fill"></i> 
                                        </a>
                                        </a>
                                        <form action="/dashboard/users/{{$user->email}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-container="body" data-animation="true" onclick="return confirm('Delete?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination pagination-success justify-content-center">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection