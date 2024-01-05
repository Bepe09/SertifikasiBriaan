<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku Baru</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    <form method="post" action="{{route('koleksi.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Judul</label>
            <input type="text" name="judul" placeholder="Judul Buku"/>
        </div>
        <div>
            <label>Gambar</label>
            <input type="text" name="gambar"/>
        </div>
        <div>
            <label>Pengarang</label>
            <input type="text" name="pengarang" placeholder="Pengarang"/>
        </div>
        <div>
            <label>Penerbit</label>
            <input type="text" name="penerbit" placeholder="Penerbit"/>
        </div>
        <div>
            <label>Tahun Terbit</label>
            <input type="date" name="tahun_terbit"/>
        </div>
        <div>
            <label>Jumlah Tersedia</label>
            <input type="text" name="jumlah_tersedia" placeholder="Jumlah Stock"/>
        </div>
        <div>
            <input type="submit" value="Tambahkan Buku"/>
        </div>
    </form>
</body>
</html>
