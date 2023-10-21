
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <h4 class="text-center">TAMBAH BUKU</h4>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form method="post" action="{{ route('buku.store') }}">
    @csrf
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
  <div class="form-group row">
    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
    <div class="col-sm-10">
    <div class='input-group date' id='datetimepicker'>
    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Enter tanggal" value="{{ Session::get('tanggal')}}">
  </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<div class="d-flex justify-content-end">
<a href="/buku" type="button" class="btn btn-primary">Batal</a>
</div>
</div>
<div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

</body>
</html>

