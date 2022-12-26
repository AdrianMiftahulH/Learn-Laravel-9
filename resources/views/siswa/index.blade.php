@extends('layout/aplikasi')

@section('content')
    <a href="/siswa/create" class="btn btn-primary">Tambah Data Siswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nomor Induk</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->foto)
                            <img src="{{ url('foto').'/'.$item->foto }}" alt="{{ $item->nama }}" width="50px" height="50px">
                        @endif
                    </td>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <a href="{{ url('/siswa/'.$item->nomor_induk) }}" class="btn btn-info">Detail</a>
                        <a href="{{ url('/siswa/'.$item->nomor_induk.'/edit') }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" action="{{ '/siswa/'.$item->nomor_induk }}" method="post" onsubmit="return confirm('yakin mau hapus data ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
