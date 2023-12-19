<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div class="m-12 p-12 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <h4 class="shrink-0 flex items-center text-center mb-3" >EDIT BUKU</h4>
    <form method="post" action="{{ route('buku.update', ['buku' => $update_buku->id]) }}" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="judul" name="judul" value="{{ $update_buku->judul }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input type="text"class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  id="penulis" name="penulis" value="{{ $update_buku->penulis }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  id="harga" name="harga" value="{{ $update_buku->harga }}">
            </div>
        </div>
       {{-- <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Rating</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " id="harga" name="harga" value="{{ $update_buku->harga }}">
            </div>
        </div> --}}

        <div class="form-group row">
        <label for="rating" class="col-sm-2 col-form-label">Rating</label>
        <div class="col-sm-10">
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">1</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="2">
        <label class="form-check-label" for="inlineRadio2">2</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="3">
        <label class="form-check-label" for="inlineRadio3">3</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="4">
        <label class="form-check-label" for="inlineRadio3">4</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="5">
        <label class="form-check-label" for="inlineRadio3">5</label>
        </div>
        </div>
        </div>

        <div class="form-group row">
            <label for="thumbnail" class="col-sm-2 col-form-label">thumbnail<span class="text-red-500">(wajib diisi)</span></label>
            <div class="col-sm-10">
                <input type="file" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="thumbnail" name="thumbnail" value="{{ $update_buku->thumbnail }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="galeri" class="col-sm-2 col-form-label">galeri</label>
            <div class="col-sm-10" id="galeri_wrapper">
                <!-- <input type="file" class="form-control mb-2" id="galeri" name="galeri" value="{{ $update_buku->galeri }}"> -->
            </div>
            <a href="javascript:void(0);" id="tambah" onclick="addFileInput()">Tambah</a>
                <script type="text/javascript">
                    function addFileInput () {
                    var div = document.getElementById('galeri_wrapper');
                    div.innerHTML += '<input type="file" name="gallery[]" id="gallery" class="form-control col-sm-10 mb-2" style="margin-bottom:5px;">';
                    };
                </script>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Simpan</button>
            </div>
        </div>
    </form>
    <div class="d-flex justify-content-end"><a href="/buku" type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Batal</a></div>
</class=>

    @foreach($update_buku->galleries()->get() as $gallery)
        <td class="relative">
            <div class="gallery_item">

                <img class="h-200 w-200 object-cover"
                src="{{asset($gallery->path)}}"
                alt=""
                />
            </div>
        </td>
    @endforeach

</body>
</html>
