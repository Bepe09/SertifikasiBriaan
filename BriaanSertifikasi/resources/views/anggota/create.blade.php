<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Anggota</title>
    <style>
        body {
            background-color: #EFDECD;
        }

        form{
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
