<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Koleksi</title>
    <style>
        input[type=text] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }

        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }

        div {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        </style>
</head>
<body>
    <h1>Edit Data Koleksi</h1>
    <form method="post" action="{{route('koleksi.update', ['koleksi' => $koleksi])}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Judul</label>
            <input type="text" name="judul" placeholder="Judul Buku" value="{{$koleksi->judul}}"/>
        </div>
        <div>
            <label>gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control"
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Gambar"
                                required>
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
