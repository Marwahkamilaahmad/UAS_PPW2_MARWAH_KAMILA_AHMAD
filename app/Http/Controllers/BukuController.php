<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_buku = DB::table('buku_migration')->get();
        $data_buku = Buku::all()->sortByDesc('id');


        return view('index', ['data_buku' => 'buku']);

    }

    /**
     * Show the form for creating a new resource.
     */
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
        $update_buku = Buku::all()->where('id',$id)->get('id');
        return view('edit', ['update_buku'=>$update_buku]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Buku::all()->where('id',$request->id)->update([
            'judul'=> $request->nama,
            'penulis' => $request->jabatan,
            'harga' => $request->umur,

        ]);
        return redirect('/buku');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data_buku = Buku::find($id);
        $data_buku->delete();
        return redirect('/buku');
    }
}
