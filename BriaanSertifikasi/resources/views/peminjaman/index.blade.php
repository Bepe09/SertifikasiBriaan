<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Peminjaman</title>
    <style>
        button{
            background-color: darkblue;
            border: 1px solid black;
            color: white;
            padding: 3px;

        }


        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li:last-child {
            border-right: none;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul>
            <li><a href="/katalog">Katalog</a></li>
            <li><a href="/koleksi">Koleksi</a></li>
            <li><a href="/anggota">Anggota</a></li>
            <li><a class="active" href="/peminjaman">Peminjaman</a></li>
            <li style="float:right"><a>Admin</a></li>
        </ul>
    </nav>
    <h1>Daftar Peminjaman</h1>
    <div>
        <a href="{{route('peminjaman.create')}}"><button>Peminjaman Koleksi</button></a>
    </div>
    <br>
    <div>
        <table border="1">
            <tr>
                <th>ID Peminjaman</th>
                <th>Judul Buku</th>
                <th>Peminjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
            </tr>
            @foreach ($peminjaman as $peminjaman)
                <tr>
                    <td>{{$peminjaman->id_peminjaman}}</td>
                    <td>{{$peminjaman->koleksi ? $peminjaman->koleksi->judul: 'Buku Tidak Ada'}}</td>
                    <td>{{$peminjaman->anggota ? $peminjaman->anggota->nama: 'Nama Tidak Ada'}}</td>
                    <td>{{$peminjaman->tanggal_peminjaman}}</td>
                    <td>{{$peminjaman->tanggal_pengembalian}}</td>
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
