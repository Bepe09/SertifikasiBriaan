<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Anggota</title>
</head>
<body>
    <h1>Pendaftaran Anggota</h1>
    <form method="post" action="{{route('anggota.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama"/>
        </div>
        <div>
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"/>
        </div>
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="alamat"/>
        </div>
        <div>
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" placeholder="08xxxxxxxx"/>
        </div>
        <div>
            <input type="submit" value="Daftarkan Anggota"/>
        </div>
    </form>
</body>
</html>
