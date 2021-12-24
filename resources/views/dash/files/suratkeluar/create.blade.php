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
                    <form role="form" method="POST" action="{{route('dashSkeluarStore')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group w-100 input-group-dynamic mt-3 mb-4 is-filled">
                            <label class="form-label">Pilih Instansi Asal surat</label>
                            <select name="asal_surat" class="form-control opacity-8" id="asal_surat" autofocus>
                                @if(count($instances)) @foreach($instances as $row)
                                <option hidden></option>
                                <option value="{{old('asal_surat', $row->id)}}">{{$row->name}}</option>
                                @endforeach @endif
                            </select>
                        </div>
                        <div class="input-group w-100 input-group-dynamic mb-3 is-filled">
                            <label class="form-label">Pilih Surat Diserahkan Kepada</label>
                            <select name="user_id" class="form-control opacity-8" id="user_id" autofocus>
                                @if(count($users)) @foreach($users as $row)
                                <option hidden></option>
                                <option value="{{old('user_id', $row->id)}}">{{$row->unique_number}} | {{$row->name}}</option>
                                @endforeach @endif
                            </select>
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3">
                            <label class="form-label">Judul Surat</label>
                            <input type="text" id="name" name="judul_surat" class="form-control @error('judul_surat') is-invalid @enderror" required value="{{old('judul_surat')}}">
                            @error('judul_surat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input hidden type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" required value="{{old('slug')}}">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" required value="{{old('no_surat')}}">
                            @error('no_surat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3">
                            <label class="form-label">Perihal Surat</label>
                            <input type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror" required value="{{old('perihal')}}">
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" required value="{{old('tanggal_surat')}}">
                            @error('tanggal_surat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Pilih File (Rekomendasi : format PDF)</label>
                            <input type="file" name="doc" class="form-control @error('doc') is-invalid @enderror" id="file-open"
                                onchange="previewFile()" accept=".pdf"><br>
                            @error('doc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required>{{old('keterangan')}}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Uploud Surat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="card-body d-flex justify-content-center">
                <iframe src="" id="iframe-pdf" width="1200px" height="800px"></iframe>
            </div>
        </div>
        @if (Auth::user()->hasRole(['stafTU']));
            <div class="col-xl-5">
                <div class="card-body d-flex justify-content-center">
                    <a href="{{ route('dashUserAdd') }}" class="btn btn-info m-4">Tambahkan Instansi Baru</a>
                    <a href="{{ route('dashInstanceAdd') }}" class="btn btn-info m-4">Tambahkan Akun Pengaju Baru</a>
                </div>
            </div>
        @endif
    </div>
</div>
    
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
        
                name.addEventListener('change', function(){
                    fetch('/dashboard/suratkeluar/checkSlug?name=' + name.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
                });
        function previewFile() {
            const preview = document.querySelector('iframe');
            const file = document.querySelector('input[type=file]').files[0];
            const reader = new FileReader();
            var filename = file.name;
            
            reader.addEventListener("load", function () {
            // convert file to base64 string
            preview.src = reader.result;
            }, false);
            
            if (file) {
            reader.readAsDataURL(file);
            }
        }

        //select
        $("#asal_surat").select2({
        placeholder: "Select a Instance",
        allowClear: true
        });
        $("#user_id").select2({
        placeholder: "Select a user",
        allowClear: true
        });


    </script>
@endsection