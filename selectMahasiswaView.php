<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1000px;
            margin: 0 auto;
        }
        /* table tr td:last-child{
            width: 120px;
        } */
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <style>
        div.scroll {

        width: 100%;
        height: 400px;
        overflow: scroll;
        }
    </style>
</head>
<body class="bg-tertiary">
    <nav class="navbar bg-danger sticky-top shadow">
      <div class="container-fluid d-flex justify-content-center">
        <h1 class="text-center text-white">PSAIT Tugas 2 (REST API)</h1>
      </div>
    </nav>
    <!-- mahasiswa -->
    <div class="wrapper shadow p-3 mt-3 mb-5 rounded">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Mahasiswa</h2>
                        <a href="insertMahasiswaView.php" class="btn btn-danger pull-right"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="scroll">
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'http://10.33.35.32/sait_project_api/mahasiswa_api.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Alamat</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["data"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["data"][$i]["id_mhs"]} </td>";
                                        echo "<td> {$json["data"][$i]["nama"]} </td>";
                                        echo "<td> {$json["data"][$i]["alamat"]} </td>";
                                        echo "<td>";
                                            echo '<a href="updateMahasiswaView.php?id_mhs='. $json["data"][$i]["id_mhs"] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="deleteMahasiswaDo.php?id_mhs='. $json["data"][$i]["id_mhs"] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
            </div>        
        </div>
    </div>

    <!-- buku -->
    <div class="wrapper shadow p-3 my-5 rounded">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Buku</h2>
                        <a href="insertBukuView.php" class="btn btn-danger pull-right"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="scroll">
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'http://10.33.35.32/buku_api/buku_api.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Judul</th>";
                                        echo "<th>Pengarang</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["data"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["data"][$i]["id_buku"]} </td>";
                                        echo "<td> {$json["data"][$i]["judul"]} </td>";
                                        echo "<td> {$json["data"][$i]["pengarang"]} </td>";
                                        echo "<td>";
                                            echo '<a href="updateBukuView.php?id_buku='. $json["data"][$i]["id_buku"] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="deleteBukuDo.php?id_buku='. $json["data"][$i]["id_buku"] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
            </div>        
        </div>
    </div>

    <!-- peminjaman -->
    <div class="wrapper shadow p-3 my-5 rounded">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Peminjaman Buku</h2>
                        <a href="insertPeminjamanView.php" class="btn btn-danger pull-right"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="scroll">
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'http://10.33.35.32/sait_project_api/peminjaman_api.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Nama</th>";
                                        echo "<th>Judul Buku</th>";
                                        echo "<th>Tgl Pinjam</th>";
                                        echo "<th>Aksi</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["data"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["data"][$i]["id_peminjaman"]} </td>";
                                        echo "<td> {$json["data"][$i]["nama"]} </td>";
                                        echo "<td> {$json["data"][$i]["judul"]} </td>";
                                        echo "<td> {$json["data"][$i]["tanggal_peminjaman"]} </td>";
                                        echo "<td>";
                                            echo '<a href="updatePeminjamanView.php?id_peminjaman='. $json["data"][$i]["id_peminjaman"] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="deletePeminjamanDo.php?id_peminjaman='. $json["data"][$i]["id_peminjaman"] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
            </div>        
        </div>
    </div>

    <p><p><p>

    <!-- weather -->
    <div class="wrapper shadow p-3 my-5 rounded">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Data dari external REST API</h2>
                    </div>
                    <div class="scroll">
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&hourly=temperature_2m');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Longitude</th>";
                                        echo "<th>Latitude</th>";
                                        echo "<th>Temperature (C)</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["hourly"]["time"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["longitude"]} </td>";
                                        echo "<td> {$json["latitude"]} </td>";
                                        echo "<td> {$json["hourly"]["temperature_2m"][$i]} </td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
            </div>        
        </div>
    </div>

    <p><p><p>
        
    <!-- myanimelist -->
    <div class="wrapper shadow p-3 my-5 rounded">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">MyAnimeList Naruto</h2>
                    </div>
                    <div class="scroll">
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'https://api.jikan.moe/v4/anime?q=naruto');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Judul</th>";
                                        echo "<th>Episode</th>";
                                        echo "<th>Score</th>";
                                        echo "<th>Status</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["data"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["data"][$i]["title"]} </td>";
                                        echo "<td> {$json["data"][$i]["episodes"]} </td>";
                                        echo "<td> {$json["data"][$i]["score"]} </td>";
                                        echo "<td> {$json["data"][$i]["status"]} </td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
            </div>        
        </div>
    </div>
 
    <p><p><p>
</body>
</html>