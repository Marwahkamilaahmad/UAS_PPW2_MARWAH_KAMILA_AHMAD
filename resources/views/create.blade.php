
@extends('layouts.master')

@section('content')
<div class="container">
    <h4 class="text-align">TAMBAH BUKU</h4>
<form method="post" action="{{ route('buku.store') }}">
    @csrf
  <div class="form-group">
    <label for="judul">Judul</label>
    <input type="text" class="form-control" id="judul"  name="judul"  placeholder="Enter judul">
  </div>
  <div class="form-group">
    <label for="penulis">Penulis</label>
    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Enter penulis">
  </div>
  <div class="form-group">
    <label for="harga">Harga</label>
    <input type="text" class="form-control" id="harga" name="harga" placeholder="Enter harga">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
<div>
<a href="/buku" type="button" class="btn btn-primary">Batal</a>
</div>
@endsection
