<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anggota</title>
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

        table {
            border-collapse: collapse;
            background-color: whitesmoke;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
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

        h1 {
            text-align: center; /* Center the h1 element */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul>
            <li><a href="/katalog">Katalog</a></li>
            <li><a href="/koleksi">Koleksi</a></li>
            <li><a class="active" href="/anggota">Anggota</a></li>
            <li><a href="/peminjaman">Peminjaman</a></li>
            <li style="float:right"><a>Admin</a></li>
        </ul>
    </nav>
    <h1>List Anggota</h1>
    <div>
        <a href="{{ route('anggota.create') }}"><button>Daftarkan Anggota</button></a>
    </div>
    <br>
    <div>
        <table border="1">
            <tr>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Edit</th>
                <th>Hapus Data</th>
            </tr>
            @foreach ($anggota as $anggota)
                <tr>
                    <td>{{ $anggota->id_anggota }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->tanggal_lahir }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>{{ $anggota->nomor_telepon }}</td>
                    <td>
                        <a href="{{ route('anggota.edit', $anggota->id_anggota) }}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('anggota.destroy', ['anggota' => $anggota]) }}">
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
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>

</html>
