<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get semua data dari data base
        // $data = siswa::all();

        // get data sesuai order by
        $data = siswa::orderBy('nama', 'asc')->paginate(5);
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        $request->validate([
            'nomor_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg,gif',
        ], [
            'nomor_induk.required' => 'Nomor Induk wajib di isi !!',
            'nomor_induk.numeric' => 'Nomor Induk wajib di isi dengan number !!',
            'nama.required' => 'Nama wajib di isi !!',
            'alamat.required' => 'Alamat wajib di isi !!',
            'foto.required' => 'Foto wajib di isi !!',
            'foto.mimes' => 'Foto hanya bisa png/jpeg/jpg !!',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama= date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);
        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama,
        ];

        siswa::create($data);
        return redirect('/siswa')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "<h1>Saya siswa $id</h1>";
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama wajib di isi !!',
            'alamat.required' => 'Alamat wajib di isi !!',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];
        if ($request->hasFile('foto')) {
            $request->validate([
                    'foto'=>'mimes:png,jpg,jpeg,gif'
            ],[
                'foto.mimes' => 'Foto hanya bisa png/jpeg/jpg !!',
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama= date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = siswa::where('nomor_induk', $id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            $data['foto'] = $foto_nama;
        };
        siswa::where('nomor_induk', $id)->update($data);
        return redirect('/siswa')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = siswa::where('nomor_induk',$id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        siswa::where('nomor_induk',$id)->delete();
        return redirect('/siswa')->with('success', 'databerhasil dihapus');
    }
}
