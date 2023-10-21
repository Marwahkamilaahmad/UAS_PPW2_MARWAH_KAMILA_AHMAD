@extends('layouts.master')

@section('content')
 <h1> This is the yeilded content from home.blade.php</h1>


@section('script')
<div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="judul"  name="judul"  placeholder="Enter judul" value="{{ Session::get('judul')}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Enter penulis" value="{{ Session::get('penulis')}}">
  </div>
  </div>
  <div class="form-group row">
    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="harga" name="harga" placeholder="Enter harga" value="{{ Session::get('harga')}}">
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
