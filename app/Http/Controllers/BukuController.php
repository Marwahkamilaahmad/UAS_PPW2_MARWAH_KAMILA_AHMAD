<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_buku = Buku::all();


        return view('index', ['buku' => $data_buku]);
    }


    public function create()
    {
        return view('create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul',$request->judul);
        Session::flash('penulis',$request->penulis);
        Session::flash('harga',$request->harga);

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required'
        ],[
            'judul.required' => 'judul wajib diisi',
            'penulis' => 'penulis wajib diisi',
            'harga' => 'harga wajib diisi'
        ]);

        $data_buku = new Buku;
        $data_buku->judul = $request->judul;
        $data_buku->penulis = $request->penulis;
        $data_buku->harga = $request->harga;
        $data_buku->save();
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $update_buku = Buku::find($id);
        return view('edit', ['update_buku' => $update_buku]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $data_buku = Buku::find($id);
        $data_buku->judul = $request->judul;
        $data_buku->penulis = $request->penulis;
        $data_buku->harga = $request->harga;
        $data_buku->save();

        return redirect('/buku');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data_hapus = Buku::find($id);
        $data_hapus->delete();
        return redirect('/buku');
    }
}
