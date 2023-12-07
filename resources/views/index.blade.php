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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

    <!-- As a heading -->


    <h1 class="text-4xl text-gray-900 dark:text-white text-center mb-6 mt-10" >SISTEM CRUD</h1>
    <div class="container">
    @if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

    <!-- <form action="{{ route('buku.search') }}" method="get">
       @csrf
        <div class="input-group">
            <input type="text" name="kata" class="form-control" placeholder="Cari..." aria-label="Cari" style="border-radius: 8px 0 0 8px">
            <button type="submit" class="btn btn-light" style="border-radius: 0 8px 8px 0">
            <i class="fas fa-search">Cari</i>
            </button>
        </div>
    </form>
    <br><br> -->

<div class="h-full bg-white px-5 py-5">
<table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
<a href="{{route('buku.create') }}" type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Create</a>
<a href="/favourite" type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Lihat Favoritku</a>
    <thead >
    <tr class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400" >
    <th scope="col" class="px-6 py-3">thumbnail</th>
        <th scope="col" class="px-6 py-3">judul buku</th>
        <th scope="col" class="px-6 py-3">penulis</th>
        <th scope="col" class="px-6 py-3">harga</th>
        <th scope="col" class="px-6 py-3">tanggal</th>
        <th scope="col" class="px-6 py-3">Rating</th>
        <th scope="col" class="px-6 py-3">aksi</th>
        <th scope="col" class="px-6 py-3">Favourite</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($buku as $data_buku)
    <tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

    <td class="relative">
            <img class="h-65 w-50"
            src="{{asset($data_buku->filepath)}}"
            alt=""/>
        </td>

         <td class="px-6 py-4">{{ $data_buku->judul }}</td>
         <td class="px-6 py-4">{{ $data_buku->penulis }}</td>
         <td class="px-6 py-4">{{ "Rp".$data_buku->harga }}</td>
         <td class="px-6 py-4">{{ $data_buku->tanggal }}</td>
        @if($data_buku->rating == 0)
         <td class="px-6 py-4"><p class="fw-bold text-danger">rating belum ditampilkan</p></td>
        @else
        <th class="px-6 py-4"><p class="fw-bold text-warning">{{ $data_buku->rating }}</p></th>
        @endif
         <td class="px-6 py-4">
        <form action="{{ route('buku.destroy', ['buku' => $data_buku->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('buku.show', $data_buku->id) }}" class="bg-gray-200 hover:bg-yellow-600 text-black py-1 px-2 rounded"> Show</a>
           {{-- <a href="{{ route('buku.edit', $data_buku->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a> --}}
            <button type="submit" class="bg-red-500 hover:bg-yellow-600 text-white py-1 px-2 rounded mb-2 ">Hapus</button>
        </form>
        <a href="{{ route('buku.edit', ['buku' => $data_buku->id]) }}" class="bg-gray-200 hover:bg-yellow-600 text-black py-1 px-2 rounded ">Edit</a>
        <a href="{{ route('buku.edit', ['buku' => $data_buku->id]) }}" class="bg-gray-200 hover:bg-yellow-600 text-black py-1 px-2 rounded">Rating</a>
    </td>
   {{-- <td class="px-6 py-4">
        <a href="{{ route('buku.favourite', ['buku' => $data_buku->id]) }}" class="px-3 toggle-heart">
            <i class="{{ $existingFav ? 'fa fa-heart' : 'fa fa-heart-o' }}" style="font-size:36px; color: red;"></i>
        </a>
    </td> --}}
    <td class="px-6 py-4">
        <a href="{{ route('buku.favourite', ['buku' => $data_buku->id]) }}" class="px-3 toggle-heart">
            <i class="{{ in_array($data_buku->judul, $existingFav) ? 'fa fa-heart' : 'fa fa-heart-o' }}" style="font-size:36px; color: red;"></i>
        </a>
    </td>

    <!-- <td><a href="{{ route('buku.favourite', ['buku' => $data_buku->id]) }}" class="btn btn-outline-primary"><i class="fa fa-heart-o" style="font-size:36px;"></i></a></td> -->
    </tr>
    @endforeach
    </tbody>
</table>
<div class="font-sans antialiased">
        total buku : {{$banyak_buku}}
</div>
</div>
</div>
</div>
<script>
    // Ambil semua elemen dengan kelas toggle-heart
// const toggleHeartIcons = document.querySelectorAll('.toggle-heart');

// Loop melalui setiap elemen dan tambahkan event listener untuk mengubah ikon
// toggleHeartIcons.forEach(icon => {
//     icon.addEventListener('click', function() {
//         // Toggle class untuk mengubah ikon hati kosong atau penuh
//         this.querySelector('i').classList.toggle('fa-heart-o');
//         this.querySelector('i').classList.toggle('fa-heart');
//     });
// });

</script>
</body>
</html>
