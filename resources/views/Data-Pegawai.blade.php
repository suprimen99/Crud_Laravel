<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
     <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No Telpon</th>
            {{-- <th scope="col">Foto</th> --}}
            <th scope="col">Di buat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @php
            ($no = 1)
            @endphp
            @foreach ($data as $karyawan)
         <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $karyawan->nama }}</td>
            <td>{{ $karyawan->jeniskelamin }}</td>
            <td>{{ $karyawan->notelpon }}</td>
            {{-- <td>
                <img src="{{ asset('fotopegawai/'.$karyawan->foto) }}" alt="" style="width: 40px;">
            </td> --}}
            <td>{{ $karyawan->created_at->diffForHumans() }}</td>
          </tr>
            @endforeach

        </tbody>

</table>
</body>
</html>
