<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
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
        <td><a href="{{route('buku.create') }}" type="button" class="btn btn-outline-primary">Create</a>
        <a href="{{route('buku.destroy') }}" type="button" class="btn btn-outline-primary">Hapus</a></td>
    </tr>
    </tbody>
</table>
        @endforeach
</body>
</html>
