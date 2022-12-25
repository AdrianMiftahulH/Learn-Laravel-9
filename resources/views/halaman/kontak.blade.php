@extends('layout/aplikasi')
    
@section('content')
    <h1>{{ $judul }}</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat suscipit tempore, necessitatibus quidem beatae ipsam sequi libero doloremque et ex.
    </p>
    <p>
        <ul>
            <li>Email: {{ $kontak['email'] }}</li>
            <li>Instagram: {{ $kontak['instagram'] }}</li>
        </ul>
    </p>
@endsection