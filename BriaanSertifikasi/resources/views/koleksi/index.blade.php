<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Koleksi</title>
</head>
<body>
    <h1>Koleksi Buku</h1>
    <div>
        <a href="{{route('koleksi.create')}}"><button>Tambahkan Buku</button></a>
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Gambar</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Tersedia</th>
                <th>Edit</th>
                <th>Hapus Buku</th>
            </tr>
            @foreach ($koleksi as $koleksi)
                <tr>
                    <td>{{$koleksi->id_buku}}</td>
                    <td>{{$koleksi->judul}}</td>
                    <td>{{$koleksi->gambar}}</td>
                    <td>{{$koleksi->pengarang}}</td>
                    <td>{{$koleksi->penerbit}}</td>
                    <td>{{$koleksi->tahun_terbit}}</td>
                    <td>{{$koleksi->jumlah_tersedia}}</td>

                    <td>
                        <a href="{{route('koleksi.edit', $koleksi->id_buku)}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('koleksi.destroy', ['koleksi' => $koleksi])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value='Hapus Data'>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <br>
    <div>
        @if (session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
</body>
</html>
