@extends('layouts.dash.main')

@section('content-main')

<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-xl-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize d-inline ps-3" id="lookKepsek"><i class="bi bi-pencil-square"></i> {{$title}}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{route('dashUserUpdate', $user->email)}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Nomor Identitas</label>
                            <input type="number" name="unique_number" class="form-control @error('unique_number') is-invalid @enderror" required value="{{old('unique_number', $user->unique_number)}}" autofocus>
                            @error('unique_number')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{old('name', $user->name)}}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{old('email', $user->email)}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Status</label>
                            {{-- <input type="status" name="status" class="form-control @error('status') is-invalid @enderror" required value="{{old('status', $user->status)}}"> --}}
                            <select name="status" id="" class="form-control">
                                <option value="0" {{ ($user->status == 0) ? 'selected' : '' }}>Noctive</option>
                                <option value="1" {{ ($user->status == 1) ? 'selected' : '' }}>Active</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline is-valid mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control is-valid @error('password') is-invalid @enderror">
                            <div class="valid-feedback">
                                <i>*Kosongkan jika tidak ingin merubah password</i>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-75 input-group-outline mb-3 justify-content-end is-filled is-valid">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="hidden" name="oldFoto" value="{{$user->foto}}">
                            @if ($user->foto)
                                <img src="{{ asset('storage/'. $user->foto) }}" class="img-preview img-fluid">
                            @else
                                <img class="img-preview img-fluid">
                            @endif
                            <input class="form-control @error('foto') is-invalid @enderror" name="foto" type="file" id="foto" onchange="previewFoto()">
                            @error('foto')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Phone Number</label>
                            <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required value="{{old('no_hp', $user->no_hp)}}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-secondary btn-lg w-100 mt-4 mb-0"><i class="bi bi-pencil-square"></i> Edit Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function previewFoto() {   
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);
        
        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
@endsection