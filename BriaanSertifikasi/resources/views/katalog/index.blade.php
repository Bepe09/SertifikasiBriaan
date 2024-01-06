<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalog</title>
    <style>
        body {
            background-color: #EFDECD;
        }

        button {
            background-color: darkblue;
            border: 1px solid black;
            color: white;
            padding: 3px;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 100px;
            padding: 50px;
        }

        .book-card {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            background-color: whitesmoke;
        }

        .book-card img {
            max-width: 100%;
            height: 200px; /* Set a fixed height for the image */
            object-fit: cover; /* Maintain aspect ratio while covering the container */
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

        img {
            max-width: 20%;
        }

        h1 {
            text-align: center; /* Center the h1 element */
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
    <div class="book-grid">
        @foreach ($koleksi as $koleksi)
            <div class="book-card">
                <h4>ID Buku: {{$koleksi->id_buku}}</h4>
                <h4>Judul Buku: {{$koleksi->judul}}</h4>
                <img src="{{ URL::to('/') }}/assets/{{ $koleksi->gambar }}" class="img-fluid" alt="Book Image">
                <p>Pengarang: {{$koleksi->pengarang}}</p>
                <p>Penerbit: {{$koleksi->penerbit}}</p>
                <p>Tahun Terbit: {{$koleksi->tahun_terbit}}</p>
                <p>Jumlah Tersedia: {{$koleksi->jumlah_tersedia}}</p>
            </div>
        @endforeach
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
