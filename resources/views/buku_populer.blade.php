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
<div class="h-full bg-white px-5 py-5">
<table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
<a href="/buku" type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Back</a>
    <thead >
    <tr class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400" >
    <th scope="col" class="px-6 py-3">thumbnail</th>
        <th scope="col" class="px-6 py-3">judul buku</th>
        <th scope="col" class="px-6 py-3">penulis</th>
        <th scope="col" class="px-6 py-3">harga</th>
        <th scope="col" class="px-6 py-3">tanggal</th>
        <th scope="col" class="px-6 py-3">Rating</th>
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
    </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</body>
</html>
