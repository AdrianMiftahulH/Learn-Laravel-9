@extends('layout/aplikasi')

@section('content')
    <a href="/siswa/create" class="btn btn-primary">Tambah Data Siswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nomor Induk</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td><a href="{{ url('/siswa/'.$item->nomor_induk) }}" class="btn btn-info">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
