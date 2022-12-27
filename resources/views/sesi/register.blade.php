@extends('layout/aplikasi')

@section('content')
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Register</h1>
    <form action="/sesi/create" method="post">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <input type="text" name="name" id="username" class="form-control" value="{{ Session::get('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ Session::get('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</div>
@endsection
