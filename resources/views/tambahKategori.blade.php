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

<h3 class="text-4xl text-gray-900 dark:text-white text-center  mt-10" >Tambah kategori</h3>
<p class=" text-gray-900 dark:text-white text-center mb-6" >Klik untuk menambahkan</p>

<form method="post" action="/bukuKategori/Manga">
    @csrf
    <input type="hidden" name="kategori" value="Manga">
    <button type="submit" class="bg-black hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Manga</button>
</form>
<form method="post" action="/bukuKategori/Novel">
    @csrf
    <input type="hidden" name="kategori" value="Manga">
    <button type="submit" class="bg-black hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Novel</button>
</form>
<form method="post" action="/bukuKategori/Filsafat">
    @csrf
    <input type="hidden" name="kategori" value="Filsafat">
    <button type="submit" class="bg-black hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Filsafat</button>
</form>
<form method="post" action="/bukuKategori/Komik">
    @csrf
    <input type="hidden" name="kategori" value="Komik">
    <button type="submit" class="bg-black hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Komik</button>
</form>
<form method="post" action="/bukuKategori/Kamus">
    @csrf
    <input type="hidden" name="kategori" value="Kamus">
    <button type="submit" class="bg-black hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Kamus</button>
</form>
<form method="post" action="/bukuKategori/Science">
    @csrf
    <input type="hidden" name="kategori" value="Science">
    <button type="submit" class="bg-black hover:bg-yellow-600 text-white py-1 px-2 rounded mr-2 mb-3">Science</button>
</form>

<table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead >
    <tr class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400" >
    <th scope="col" class="px-6 py-3">kategori buku -> judul buku : {{$namaBuku}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($kategori as $kategoris)
    <tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    
    </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
</body>
</html>
