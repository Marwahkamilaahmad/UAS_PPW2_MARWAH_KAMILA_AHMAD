{{--<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

</head>
<body>
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Buku : {{$bukus->judul}}</h2>
        <hr>
        <div class="row">
            @foreach ($galeris as $data)
            <div class="col-md-4">
                <a href="{{asset('images/'.$data->foto)}}" data-lightbox="image-1" data-title="{{$data->keterangan }}">
            <img src="{{asset('images/'.$data->foto) }}" style="width:200px; height:150px;">
            </a>
            <p><h5>{{ $data->nama_galeri }}</h5></p>
            </div>
            @endforeach
        </div>
        <div>{{ $galeris->links() }}</div>
    </div>
</section>

</body>
</html> -->--}}


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


<div class="container pt-5">
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>id</th>
        <th>thumbnail</th>
        {{--<th>gallery</th>--}}
        <th>judul buku</th>
        <th>penulis</th>
        <th>harga</th>
        <th>tanggal</th>
        <th>aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($bukus as $data_buku)
    <tr>
        <td>{{ $data_buku->id }}</td>

        <td class="relative">
            <img class="h-200 w-200 object-cover object-center"
            src="{{asset($data_buku->filepath)}}"
            alt=""/>
        </td>
       {{-- @foreach($data_buku->galleries()->get() as $gallery)
        <td class="relative">
            <div class="gallery_item">
                <img class="h-200 w-200 object-cover"
                src="{{asset($gallery->path)}}"
                alt=""
                />
            </div>
        </td>
        @endforeach --}}
        <td>{{ $data_buku->judul }}</td>
        <td>{{ $data_buku->penulis }}</td>
        <td>{{ "Rp".$data_buku->harga }}</td>
        <td>{{ $data_buku->tanggal }}</td>
        <td>
        <form action="{{ route('buku.destroy', ['buku' => $data_buku->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('buku.show', $data_buku->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Detail</a>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div>
   {{-- <!-- <ul class="pagination justify-content-center">
        {{ $buksu->links() }}
    </ul> -->--}}
</div>
</div>
</body>
</html>
