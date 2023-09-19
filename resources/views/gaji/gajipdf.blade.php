<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard |karyawan</title>
    <style>
       table { 
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-top: 1px solid #ddd;
        }

        tr:hover {background-color: #f5f5f5;}
        
        h1{
            text-align: center
        }
    </style>
</head>

            <!-- content start -->
            <div class="col-9 border rounded-4 bg">
                    <h1>Slip Gaji karyawan</h1>
                    <table class="table table-primary">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Pulang</th>
                            <th scope="col">Total Jam</th>
                            <th scope="col">Gaji</th>
                            <th scope="col">Total Gaji</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>
                            @foreach ($absensi as $absensi)
                          <tr>
                            <td scope="row" class="">{{ $no++ }}</td>
                            <td class="" >{{ $absensi->nama }}</td>
                            <td class="" >{{ $absensi->hari_masuk }}</td>
                            <td class="" >{{ $absensi->jam_masuk }}</td>
                            <td class="" >{{ $absensi->jam_pulang }}</td>
                            <td class="" >{{ $absensi->total }}</td>
                            <td class="" >{{ $absensi->gaji }}</td>
                            <td class="" >{{ $absensi->totaljam }}</td>
                          </tr>
                          @endforeach
                          @foreach ($total as $total)
                          <tr>
                            <td colspan="7"></td>
                            <td >{{ $total->totalgaji }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    <div class="mt-3  container-fluid">
                    </div>
                </div>
                <!-- content end -->
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
    </html>