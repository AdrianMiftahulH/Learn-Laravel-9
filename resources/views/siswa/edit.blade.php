@extends('layout/aplikasi')

@section('content')
    <a href="/siswa" class="btn btn-dark">Kembali</a>
    <form method="post" action="{{ '/siswa/'.$data->nomor_induk }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h1>Nomor Induk : {{ $data->nomor_induk }}</h1>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama" value="{{ $data->nama }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ $data->alamat }}</textarea>
        </div>
        @if ($data->foto)
            <div class="mb-3">
                <img src="{{ url('foto').'/'.$data->foto }}" alt="{{ $data->nama }}" width="50px" height="50px">
            </div>
        @endif
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input name="foto" type="file" class="form-control" id="foto">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
