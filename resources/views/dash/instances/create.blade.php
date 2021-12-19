@extends('layouts.dash.main')

@section('content-main')

<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-xl-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize d-inline ps-3" id="lookKepsek"><i
                                class="bi bi-person-plus"></i> {{$title}}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{route('dashInstanceStore')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{old('name')}}" autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input  hidden type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" required value="{{old('slug')}}">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" required value="{{old('alamat')}}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">No Telp Instance (+62)</label>
                            <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required value="62{{old('no_hp')}}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add Instance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
        
                name.addEventListener('change', function(){
                    fetch('/dashboard/instances/checkSlug?name=' + name.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
                });
    </script>
@endsection