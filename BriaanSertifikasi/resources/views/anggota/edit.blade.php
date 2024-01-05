<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Anggota</title>
</head>
<body>
    <h1>Edit Anggota</h1>
    <form method="post" action="{{route('anggota.update', ['anggota' => $anggota])}}">
        @csrf
        @method('put')
        <div>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama" value="{{$anggota->nama}}"/>
        </div>
        <div>
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{$anggota->tanggal_lahir}}"/>
        </div>
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="alamat" value="{{$anggota->alamat}}"/>
        </div>
        <div>
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" placeholder="08xxxxxxxx" value="{{$anggota->nomor_telepon}}"/>
        </div>
        <div>
            <input type="submit" value="Simpan Perubahan"/>
        </div>
    </form>
</body>
</html>
