<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>

</head>
<body>
<script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Informasi Buku
                </div>
                <div class="float-end">
                    <a href="{{ route('galeri.buku') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Judul:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $buku->judul }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Penulis:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $buku->penulis }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Harga:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $buku->harga }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Tanggal:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $buku->tanggal }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Galeri :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        @foreach($buku->galleries()->get() as $gallery)
                        <a href="{{asset($gallery->path)}}" data-lightbox="image-1">
                                <div class="gallery_item">
                                <img class="h-100 w-100 object-cover"
                                    src="{{asset($gallery->path)}}"
                                    alt=""
                                />
                                </div>
                         </a>
                        @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
