<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        return view("halaman/index");
    }

    function tentang()
    {
        return view("halaman/tentang");
    }
    
    function kontak()
    {
        $data = [
            'judul' => 'Ini Halaman Kontak',
            'kontak' => [
                'email' => 'adrianmiftahul@gmail.com',
                'instagram' => '@adrianmiftahul'
            ]
    ];
        return view("halaman/kontak")->with($data);
    }
}
