<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Favourite;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use Image;
use Intervention\Image\Facades\Image;

// use Faker\Provider\Image;
// use Intervention\Image\Image;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banyak_buku = Buku::all()->count();
        $buku = Buku::all();
        $user = Auth::user()->id;
        $kategori = KategoriBuku::all();
        $existingFav = Favourite::where('user_id', $user)->pluck('judul_buku')->toArray();

        return view('index', ['buku' => $buku,'banyak_buku'=>$banyak_buku, 'existingFav'=>$existingFav, 'kategori'=>$kategori]);
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
        $data_buku->inputan = 0;
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

        $buku = Buku::find($id);
        $ratings = $buku->rating;
        $input = $buku->inputan;

        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
        $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');

        Image::make(storage_path().'/app/public/uploads/'.$fileName)
            ->fit(240,320)
            ->save();

            $ratingsInput = $request->rating;
            if (empty($ratingsInput)) {
                $totalRating = $ratings + 0;
                $buku->update([
                    'rating' => $totalRating,
                ]);
            } else {
                $totalRating = $ratings + $ratingsInput;
                $tambahInputan = $input + 1;
                $buku->update([
                    'rating' => $totalRating/$tambahInputan,
                    'inputan' => $tambahInputan,
                ]);
            }

        $buku->update([
            'judul'     => $request->judul,
            'penulis'   => $request->penulis,
            'harga'     => $request->harga,
            'filename'  => $fileName,
            'filepath'  => '/storage/' . $filePath
        ]);

        if ($request->file('gallery')) {
            foreach($request->file('gallery') as $key => $file) {
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                $gallery = Gallery::create([
                    'nama_galeri'   => $fileName,
                    'path'          => '/storage/' . $filePath,
                    'foto'          => $fileName,
                    'buku_id'       => $id
                ]);
            }
        }

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

    public function galbuku(){
        // $bukus = Buku::where('buku_seo', $title)->first();
        // return view('index', ['buku' => Buku::paginate(5),'banyak_buku'=>$banyak_buku]);
        $bukus = Buku::all();
        // $galeris = $bukus->photos()->orderBy('id','desc')->paginate(6);
        return view('galeri.buku', compact('bukus'));
    }

    public function addToFav(Request $request, string $id){

        $buku = Buku::find($id);
        $user = Auth::user()->id;
        $addFav = Favourite::all();
        $existingFav = Favourite::where('user_id', $user)->where('judul_buku', $buku->judul)->first();



        if(!$existingFav){
            $fav = new Favourite();
            $fav->create([
                'judul_buku' => $buku->judul,
                'penulis' => $buku->penulis,
                'user_id' => $user,
                'filepath' => $buku->filepath,
            ]);
        }else{
            $existingFav->delete();
        }


        // return view('index', compact('existingFav', 'buku'));
        return redirect('/buku');
    }
    public function liatFav(){

        $addFav = Favourite::all();

        return view('listFav', compact('addFav'));
    }

    public function populerBook(){

        $buku = Buku::orderBy('rating', 'desc')
        ->take(10)
        ->get();

        return view('buku_populer', compact('buku'));
    }

    public function tambahKategori($id){
        $buku = Buku::find($id);
        $namaBuku = $buku->judul;
        $kategori = KategoriBuku::find($id);
        return view('tambahKategori', compact('namaBuku', 'kategori'));
    }

//     public function simpanKategori(Request $request, $kategori)
// {
//     // Ambil data buku yang akan ditambahkan kategori
//     $bukuId = $request->input('buku_id');

//     // Simpan data ke tabel kategori_buku
//     KategoriBuku::create([
//         'judul_buku' => $request->input('judul_buku'),
//         'penulis' => $request->input('penulis'),
//         'kategori'=> $kategori,
//         'buku_id' => $bukuId,
//     ]);

//     return route('/buku');
// }

public function simpanKategori(Request $request)
{
    // Ambil data kategori dari form
    $kategori = $request->input('kategori');
    $bukuId = $request->input('buku_id');

    // Simpan data ke tabel kategori_buku
    KategoriBuku::create([
        'judul_buku' => $request->input('judul_buku'),
        'penulis' => $request->input('penulis'),
        'kategori' => $kategori,
        'buku_id' => $bukuId,
    ]);

    // Redirect ke halaman buku setelah simpan kategori
    return redirect('/buku');
}


}
