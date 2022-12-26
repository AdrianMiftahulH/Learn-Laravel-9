@extends('layout/aplikasi')

@section('content')
    <form method="post" action="/siswa">
        @csrf
        <div class="mb-3">
            <label for="nomor_induk" class="form-label">Nomor Induk</label>
            <input name="nomor_induk" type="text" class="form-control" id="nomor_induk" value="{{ Session::get('nomor_induk') }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama" value="{{ Session::get('nama') }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ Session::get('alamat') }}</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
