<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Koleksi</title>
</head>
<body>
    <h1>Edit Data Koleksi</h1>
    <form method="post" action="{{route('koleksi.update', ['koleksi' => $koleksi])}}">
        @csrf
        @method('put')
        <div>
            <label>Judul</label>
            <input type="text" name="judul" placeholder="Judul Buku" value="{{$koleksi->judul}}"/>
        </div>
        <div>
            <label>gambar</label>
            <input type="text" name="gambar" value="{{$koleksi->gambar}}"/>
        </div>
        <div>
            <label>Pengarang</label>
            <input type="text" name="pengarang" placeholder="Pengarang" value="{{$koleksi->pengarang}}"/>
        </div>
        <div>
            <label>Penerbit</label>
            <input type="text" name="penerbit" placeholder="Penerbit" value="{{$koleksi->penerbit}}"/>
        </div>
        <div>
            <label>Tahun Terbit</label>
            <input type="date" name="tahun_terbit" placeholder="Tahun Terbit" value="{{$koleksi->tahun_terbit}}"/>
        </div>
        <div>
            <label>Jumlah Tersedia</label>
            <input type="text" name="jumlah_tersedia" placeholder="Jumlah Stock" value="{{$koleksi->jumlah_tersedia}}"/>
        </div>
        <div>
            <input type="submit" value="Simpan Perubahan"/>
        </div>
    </form>
</body>
</html>
