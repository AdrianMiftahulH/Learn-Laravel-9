@extends('layout/aplikasi')

@section('content')
    <div>
        <a href="/siswa" class="btn btn-dark">Kembali</a>
        <h1>{{ $data->nama }}</h1>
        <p>
            <b>
                Nomor Induk
            </b>
            {{ $data->nomor_induk }}
        </p>
        <p>
            <b>
                Alamat
            </b>
            {{ $data->alamat }}
        </p>
    </div>
@endsection