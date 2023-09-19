<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard |karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dash.css">
</head>
<body>
    <!-- header statr-->
    <div class="container-fluid text-light text-center pt-4 bg">
        <nav class="navbar navbar-expand-lg bg-dark  rounded-4 ">
            <div class="container-fluid ">
                <a class="navbar-brand text-light" href="/dashboard"><h1>Dashboard</h1></a>
                <div class=" justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="{{ route('logout') }}">log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- header end-->

    <div class="container-fluid bg-transparent rounded-4 mt-3">
        <div class="row height  justify-content-around">

            <!-- sidebar statr-->
            <div class="col-2 border rounded-4" id="side">
                <h4>Menu</h4>
                <div class="list-group pb-1" >
                    <a href="{{ route('karyawan') }}" class="list-group-item list-group-item-action bg-dark text-light">karyawan</a>
                    <a href="{{ route('absensi') }}" class="list-group-item list-group-item-action bg-dark text-light">absensi</a>
                    <a href="{{ route('gaji.index') }}" class="list-group-item list-group-item-action bg-dark text-light">gaji</a>
                </div>
            </div>
            <!-- sidebar end -->

            <!-- content start -->
            <div class="col-9 border rounded-4">
                    <h3>Karyawan</h3>
                    <a href="{{ route('karyawan.add') }}" class="w-full">
                        <button class="mt-2 btn btn-outline-primary">Tambah Data</button>
                    </a>

                    <div class="mt-3  container-fluid">
                        <table class="table table-stripped-columns text-light">
                            <thead class="">
                                <tr class="table-active text-light">
                                    <th scope="col" class="">
                                        NO 
                                    </th>
                                    <th scope="col" class="">
                                        NIP 
                                    </th>
                                    <th scope="col" class="">
                                        Nama 
                                    </th>
                                    <th scope="col" class="">
                                        Jabatan 
                                    </th>
                                    <th scope="col" class="">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1 ?>
                                @foreach ($karyawan as $karyawan)
                                    <tr class="">
                                        <td scope="row" class="">{{ $no++ }}</td>
                                        <td class="" >{{ $karyawan->nip }}</td>
                                        <td class="" >{{ $karyawan->nama }}</td>
                                        <td class="" >{{ $karyawan->level }}</td>
                                        <td class="px-6 py-4">
                                            <!-- <a href="#" class="bg-blue-600 p-2 rounded-lg text-white">View</a> -->
                                            <a href="/karyawan/edit_user/" class="text-light"><button class="btn btn-outline-primary">Edit</button></a>
                                            <a href="/karyawan/delete_user/" class="text-light"><button class="btn btn-outline-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <!-- content end -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>