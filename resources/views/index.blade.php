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
    <div class="container">
    <a href="{{route('buku.create') }}" type="button" class="btn btn-outline-primary px-5 my-5">Create</a>

    @if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

    <form action="{{ route('buku.search') }}" method="get">
                        @csrf
        <div class="input-group">
            <input type="text" name="kata" class="form-control" placeholder="Cari..." aria-label="Cari" style="border-radius: 8px 0 0 8px">
            <button type="submit" class="btn btn-primary" style="border-radius: 0 8px 8px 0">
            <i class="fas fa-search">Cari</i>
            </button>
        </div>
    </form>
    <br><br>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>id</th>
        <th>judul buku</th>
        <th>penulis</th>
        <th>harga</th>
        <th>tanggal</th>
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
        <td>{{ $data_buku->tanggal }}</td>
        <td>
        <form action="{{ route('buku.destroy', ['buku' => $data_buku->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('buku.show', $data_buku->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
            <a href="{{ route('buku.edit', $data_buku->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
            <button type="submit" class="btn btn-outline-danger">Hapus</button>
        </form>
        <a href="{{ route('buku.edit', ['buku' => $data_buku->id]) }}" class="btn btn-outline-primary">Edit</a>
    </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div>
        total buku : {{$banyak_buku}}
    </div>
<div>
    <ul class="pagination justify-content-center">
        {{ $buku->links() }}
    </ul>
</div>
</div>
</body>
</html>
