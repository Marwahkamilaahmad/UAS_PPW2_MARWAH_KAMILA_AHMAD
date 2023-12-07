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
<div class="container">
<div class="h-full bg-white px-5 py-5">

<h3 class="text-4xl text-gray-900 dark:text-white text-center mb-6 mt-10" >FAVORIT ANDA</h3>
<table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead >
    <tr class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400" >
    <th scope="col" class="px-6 py-3">thumbnail</th>
        <th scope="col" class="px-6 py-3">judul buku</th>
        <th scope="col" class="px-6 py-3">penulis</th>
        <th scope="col" class="px-6 py-3">harga</th>
        <th scope="col" class="px-6 py-3">Rating</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($addFav as $data_buku)
    <tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="relative">
            <img class="h-35 w-20"
            src="{{asset($data_buku->filepath)}}"
            alt=""/>
        </td>
         <td class="px-6 py-4">{{ $data_buku->judul_buku }}</td>
         <td class="px-6 py-4">{{ $data_buku->penulis }}</td>
         <td class="px-6 py-4">{{ "Rp".$data_buku->harga }}</td>
        @if($data_buku->rating == 0)
         <td class="px-6 py-4"><p class="fw-bold text-danger">rating belum ditampilkan</p></td>
        @else
        <th class="px-6 py-4"><p class="fw-bold text-warning">{{ $data_buku->rating }}</p></th>
        @endif
         <td class="px-6 py-4">
    </td>
    @endforeach
    </tbody>
</table>
</div>
</div>
</body>
</html>
