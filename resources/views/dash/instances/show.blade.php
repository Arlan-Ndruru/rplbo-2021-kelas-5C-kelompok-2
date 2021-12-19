@extends('layouts.dash.main')

@section('content-main')

<div class="col-xl-8">
    <div class="card" data-animation="true">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <a class="d-block blur-shadow-image">
                <img src="https://images.unsplash.com/photo-1525439989537-9584b5b4deea?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE0fHx8ZW58MHx8fHw%3D&w=1000&q=80"
                    alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
            </a>
            <div class="colored-shadow"
                style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);">
            </div>
        </div>
        <div class="card-body text-center">
            <div class="d-flex mt-n6 mx-auto">
                <a href="{{route('dashInstanceEdit', $instance->slug)}}" class="btn btn-link text-info ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Edit">
                    <i class="large material-icons text-lg">edit</i>
                </a>
                <form action="{{route('dashInstanceDelete', $instance->slug)}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="ms-auto btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="Delete" data-container="body" data-animation="true"
                        onclick="return confirm('Delete instance, Are you sure?')">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </form>
            </div>
            <h5 class="font-weight-normal mt-3">
                <a href="#">{{$instance->name}}</a>
            </h5>
            <p class="mb-0">
                
            </p>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer d-flex">
            <i class="material-icons text-lg me-1 my-auto">phone</i>
            <p class="font-weight-normal my-auto me-4">+{{$instance->no_hp}}</p>
            <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
            <p class="text-sm my-auto">{{$instance->alamat}}</p>
        </div>
    </div>
</div>
@endsection