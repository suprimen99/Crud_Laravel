<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Data Karyawan</title>
  </head>
  <body>
<h1 class="text-center mb-4">DATA PEGAWAI</h1>
    <div class="container">
        <a href="/tambahpegawai" type="button" class="btn btn-success mb-3  ">Tambah</a>

   <div class="row">
        <form class="row" action="/" method="GET">
        <div class="col-auto">
            <input type="text" class="form-control" id="search" name="search" placeholder="search">
        </div>
        <div class="col-auto">
            <a href="/exportpdf" class="btn btn-primary mb-3">Export PDF</a>
        </div>
        </form>
   </div>

{{--
<div class="row">
     @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
        {{ $message }}
        </div>
    @endif
</div> --}}
 <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No Telpon</th>
            <th scope="col">Foto</th>
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
            <td>
                <img src="{{ asset('fotopegawai/'.$karyawan->foto) }}" alt="" style="width: 40px;">
            </td>
            <td>{{ $karyawan->created_at->diffForHumans() }}</td>
            <td>
                <a href="#" class="btn btn-danger delete" data-id="{{ $karyawan->id }}" data-nama="{{ $karyawan->Nama }}">Delete</a>
                <a href="/tampilkandata/{{$karyawan->id}}"  class="btn btn-warning">Update</a>
            </td>
          </tr>
            @endforeach

        </tbody>

</table>

     {{ $data->links() }}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
  <script>
    $('.delete').click(function(){
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');


        swal({
        title: "Yakin?",
        text: "Kamu yakin ingin menghapus data nama "+nama+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location ="/deletedata/"+pegawaiid+""
            swal("Data Berhasil Terhapus!", {
            icon: "success",
            });
        } else {
            swal("Data Tidak Jadi Terhapus");
        }
        });
    });

  </script>

  <script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
  </script>
</html>
