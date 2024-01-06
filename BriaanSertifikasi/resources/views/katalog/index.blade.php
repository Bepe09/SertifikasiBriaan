<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Koleksi</title>

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
            <li style="float:right"><a href="/koleksi">Admin</a></li>
        </ul>
    </nav>
    <h1>Koleksi Buku</h1>
    <br>
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
            </tr>
            @foreach ($koleksi as $koleksi)
                <tr>
                    <td>{{$koleksi->id_buku}}</td>
                    <td>{{$koleksi->judul}}</td>
                    <td><img src="{{ URL::to('/') }}/assets/{{ $koleksi->gambar }}" class="img-fluid" alt="Food Image"></td>
                    <td>{{$koleksi->pengarang}}</td>
                    <td>{{$koleksi->penerbit}}</td>
                    <td>{{$koleksi->tahun_terbit}}</td>
                    <td>{{$koleksi->jumlah_tersedia}}</td>
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
