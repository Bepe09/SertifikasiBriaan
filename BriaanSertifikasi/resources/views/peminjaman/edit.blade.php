<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Anggota</title>
    <style>
        body {
            background-color: #EFDECD;
        }

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
    <h1>Edit Data Peminjaman</h1>
    <form method="post" action="{{ route('peminjaman.update', ['peminjaman' => $peminjaman]) }}">
        @csrf
        @method('put')
        <div>
            <label>Judul Buku</label>
            <select name="id_buku" id="id_buku" class="form-select">
                <option value="" selected disabled>Pilih Buku</option>
                @foreach ($koleksi as $koleksi)
                    <option value="{{ $koleksi->id_buku }}"
                        {{ $koleksi->id_buku == $peminjaman->id_buku ? 'selected' : '' }}>
                        {{ $koleksi->judul }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Nama Peminjam</label>
            <select name="id_anggota" id="id_anggota" class="form-select">
                <option value="" selected disabled>Nama Anggota</option>
                @foreach ($anggota as $anggota)
                    <option value="{{ $anggota->id_anggota }}"
                        {{ $anggota->id_anggota == $peminjaman->id_anggota ? 'selected' : '' }}>
                        {{ $anggota->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman"
                value="{{ $peminjaman->tanggal_peminjaman }}" readonly />
        </div>
        <div>
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian"
                value="{{ $peminjaman->tanggal_pengembalian }}" required />
        </div>
        <div>
            <label>Status Pengembalian</label>
            <select name="status_pengembalian" id="status_pengembalian" class="form-select">
                <option value="Sudah Kembali">Sudah Kembali</option>
                <option value="Belum Kembali" selected>Belum Kembali</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Simpan Perubahan" />
        </div>
    </form>
</body>

</html>
