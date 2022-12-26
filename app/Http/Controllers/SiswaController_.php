<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index() {
        // get semua data dari data base
        // $data = siswa::all();

        // get data sesuai order by
        $data = siswa::orderBy('nama', 'asc')->paginate(1);
        return view('siswa/index')->with('data', $data);
    }

    function detail($id)
    {
        // return "<h1>Saya siswa $id</h1>";
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/show')->with('data',$data);
    }

    function create()
    {

    }

    function delete()
    {

    }


}
