<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body class="bg-tertiary">
    <nav class="navbar bg-danger sticky-top shadow">
      <div class="container-fluid d-flex justify-content-center">
        <h1 class="text-center text-white">PSAIT Tugas 2 (REST API)</h1>
      </div>
    </nav>
    <div class="wrapper shadow p-3 py-5 my-5 rounded bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header mt-0">
                        <h2>Tambah Data</h2>
                    </div>
                    <p>Please fill this form and submit to add peminjaman record to the database.</p>
                    <form action="insertPeminjamanDo.php" method="post">
                        <div class="form-group">
                            <label>ID mahasiswa</label>
                            <input type="text" name="id_mhs" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ID buku</label>
                            <input type="text" name="id_buku" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_peminjaman" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-danger w-100" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>