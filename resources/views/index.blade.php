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
    <h1 class="text-center" >SISTEM CRUD</h1>
    <td><a href="{{route('buku.create') }}" type="button" class="btn btn-outline-primary">Create</a>
    <div class="container">
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>id</th>
        <th>judul buku</th>
        <th>penulis</th>
        <th>harga</th>
        <th>aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($buku as $data_buku)
    <tr>
        <td>{{ $data_buku->id }}</td>
        <td>{{ $data_buku->judul }}</td>
        <td>{{ $data_buku->penulis }}</td>
        <td>{{ "Rp".$data_buku->harga }}</td>
        <td>
        <form action="{{ route('buku.destroy', ['buku' => $data_buku->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-primary">Hapus</button>
        </form>
        <!-- <a href="{{route('buku.destroy',['buku' => $data_buku->id])}}" type="button" class="btn btn-outline-primary" >Hapus</a> -->
        <a href="/pegawai/edit/{{ $data_buku->id }}" type="button" class="btn btn-outline-primary">Edit</a>
    </td>
    </tr>
    @endforeach
    </tbody>

</table>
</div>

</body>
</html>
