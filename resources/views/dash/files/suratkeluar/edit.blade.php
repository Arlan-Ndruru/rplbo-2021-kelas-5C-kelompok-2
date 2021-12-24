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
                    <form role="form" method="POST" action="{{route('dashSkeluarUpdate', $skeluar->slug)}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="input-group w-100 input-group-dynamic mt-3 mb-3 is-filled">
                            <span></span>
                            <label class="form-label">Pilih Instansi Asal surat</label>
                            <select name="asal_surat" class="form-control opacity-8" id="asal_surat" autofocus>
                                @if(count($instances)) @foreach($instances as $row)
                                <option hidden></option>
                                <option value="{{old('asal_surat', $row->id)}}" 
                                    {{ ($row->id == $skeluar->asal_surat) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach @endif
                            </select>
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Judul Surat</label>
                            <input type="text" id="name" name="judul_surat" class="form-control @error('judul_surat') is-invalid @enderror" required value="{{old('judul_surat', $skeluar->judul_surat)}}">
                            @error('judul_surat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input hidden type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" required value="{{old('slug', $skeluar->slug)}}">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" required value="{{old('no_surat', $skeluar->no_surat)}}">
                            @error('no_surat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Status Surat</label>
                            <select name="status" class="form-control">
                                @if (Auth::user()->hasRole('stafTU'))
                                    <option value="st-uploud" {{ ($skeluar->status == "st-uploud") ? 'selected' : '' }}>Ajukan Kepada Kepala TU
                                    </option>
                                    <option value="valid-uploud" {{ ($skeluar->status == "valid-uploud") ? 'selected' : '' }} >Revisi</option>
                                @elseif(Auth::user()->hasRole('kepalaTU'))
                                    <option value="st-uploud" {{ ($skeluar->status == "st-uploud") ? 'selected' : '' }}>Belum Proses</option>
                                    <option value="kt-uploud" {{ ($skeluar->status == "kt-uploud") ? 'selected' : '' }} >Proses, Ajukan Kepada KepalaSekolah</option>
                                    <option value="valid-uploud" {{ ($skeluar->status == "valid-uploud") ? 'selected' : '' }}>Ajukan Revisi</option>
                                @else
                                    <option value="kt-uploud" {{ ($skeluar->status == "kt-uploud") ? 'selected' : '' }}>Belum diproses</option>
                                    <option value="ksk-uploud" {{ ($skeluar->status == "ksk-uploud") ? 'selected' : '' }} >Telah DiLeges/TTD/Disetujui</option>
                                @endif                        
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Perihal Surat</label>
                            <input type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror" required value="{{old('perihal', $skeluar->perihal)}}">
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Pilih File (Rekomendasi : format PDF)</label>
                            <input type="text" name="docOld" hidden value="{{ $skeluar->doc }}">
                            <input type="file" name="doc" class="form-control is-valid @error('doc') is-invalid @enderror" id="file-open"
                                onchange="previewFile()" accept=".pdf"><br>
                            <div class="valid-feedback">
                                *Biarkan kosong jika tidak ingin mengganti file
                            </div>
                            @error('doc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" required value="{{old('tanggal_surat', $skeluar->tanggal_surat)}}">
                            @error('tanggal_surat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group w-100 input-group-outline mb-3 is-filled">
                            <label class="form-label">Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required>{{old('keterangan', $skeluar->keterangan)}}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update Surat</button>
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
    </script>
@endsection