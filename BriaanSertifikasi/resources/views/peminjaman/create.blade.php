<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Buku</title>
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
    <h1>Peminjaman Buku</h1>
    <form method="post" action="{{route('peminjaman.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Judul Buku</label>
            <select name="id_buku" id="id_buku" class="form-select">
                <option value="" selected disabled>Pilih Buku</option>
                @foreach ($koleksi as $koleksi)
                    <option value="{{$koleksi->id_buku}}">{{$koleksi->judul}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Nama Peminjam</label>
            <select name="id_anggota" id="id_anggota" class="form-select">
                <option value="" selected disabled>Nama Anggota</option>
                @foreach ($anggota as $anggota)
                    <option value="{{$anggota->id_anggota}}">{{$anggota->nama}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_peminjaman"/>
        </div>
        <div>
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_pengembalian"/>
        </div>
        <div>
            <input type="submit" value="Pinjamkan Koleksi"/>
        </div>
    </form>
</body>
</html>
