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
        $banyak_buku = Buku::all()->count();
        return view('index', ['buku' => Buku::paginate(5),'banyak_buku'=>$banyak_buku]);
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis', 'like', "%".$cari."%")
            ->paginate($batas);
        return view('search', compact('data_buku', 'cari'));
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

        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'max:50|required',
            'harga' => 'required|numeric'
        ],[
            'judul.required' => 'judul wajib diisi',
            'penulis.required' => 'penulis wajib diisi',
            'harga.required' => 'harga wajib diisi'
        ]);

        $data_buku = new Buku;
        $data_buku->judul = $request->judul;
        $data_buku->penulis = $request->penulis;
        $data_buku->harga = $request->harga;
        $data_buku->tanggal = $request->tanggal;
        $data_buku->save();

        Session::flash('status', 'success');
        Session::flash('message', 'add new buku success');

        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
        return view('show',['buku'=> $buku]);
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
