<?php
require_once "config.php"; // Pastikan ini mengarah ke file koneksi yang benar
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id_peminjaman"])) {
            $id = intval($_GET["id_peminjaman"]);
            get_peminjaman($id);
        } else {
            get_peminjamans();
        }
        break;
    case 'POST':
        if (!empty($_GET["id_peminjaman"])) {
            $id = intval($_GET["id_peminjaman"]);
            update_peminjaman($id);
        } else {
            insert_peminjaman();
        }
        break;
    case 'DELETE':
        $id = intval($_GET["id_peminjaman"]);
        delete_peminjaman($id);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_peminjamans()
{
    global $mysqli;
    $query = "SELECT p.id_peminjaman, p.tanggal_peminjaman, b.judul, m.nama
              FROM peminjaman p
              JOIN buku b ON p.id_buku = b.id_buku
              JOIN mahasiswa m ON p.id_mhs = m.id_mhs";
    $data = array();
    $result = $mysqli->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'Get List Peminjaman Successfully.',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

function get_peminjaman($id = 0)
{
    global $mysqli;
    $query = "SELECT p.id_peminjaman, p.tanggal_peminjaman, b.judul, m.nama
              FROM peminjaman p
              JOIN buku b ON p.id_buku = b.id_buku
              JOIN mahasiswa m ON p.id_mhs = m.id_mhs";
    if ($id != 0) {
        $query .= " WHERE p.id_peminjaman=" . $id . " LIMIT 1";
    }
    $data = array();
    $result = $mysqli->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'Get Peminjaman Successfully.',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert_peminjaman()
{
    global $mysqli;
    if (!empty($_POST["id_mhs"])) {
        $data = $_POST;
    } else {
        $data = json_decode(file_get_contents('php://input'), true);
    }

    $arrcheckpost = array('id_mhs' => '', 'id_buku' => '', 'tanggal_peminjaman' => '');
    $hitung = count(array_intersect_key($data, $arrcheckpost));
    if ($hitung == count($arrcheckpost)) {
        $id_mhs = $data['id_mhs'];
        $id_buku = $data['id_buku'];
        $tanggal_peminjaman = $data['tanggal_peminjaman'];

        $result = mysqli_query($mysqli, "INSERT INTO peminjaman SET
                                          id_mhs = '$id_mhs',
                                          id_buku = '$id_buku',
                                          tanggal_peminjaman = '$tanggal_peminjaman'");

        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Peminjaman Added Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Peminjaman Addition Failed.'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Parameter Do Not Match'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function update_peminjaman($id)
{
    global $mysqli;
    if (!empty($_POST["id_mhs"])) {
        $data = $_POST;
    } else {
        $data = json_decode(file_get_contents('php://input'), true);
    }

    $arrcheckpost = array('id_mhs' => '', 'id_buku' => '', 'tanggal_peminjaman' => '');
    $hitung = count(array_intersect_key($data, $arrcheckpost));
    if ($hitung == count($arrcheckpost)) {
        $id_mhs = $data['id_mhs'];
        $id_buku = $data['id_buku'];
        $tanggal_peminjaman = $data['tanggal_peminjaman'];

        $result = mysqli_query($mysqli, "UPDATE peminjaman SET
                                          id_mhs = '$id_mhs',
                                          id_buku = '$id_buku',
                                          tanggal_peminjaman = '$tanggal_peminjaman'
                                          WHERE id_peminjaman='$id'");

        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Peminjaman Updated Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Peminjaman Updation Failed.'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Parameter Do Not Match'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function delete_peminjaman($id)
{
    global $mysqli;
    $query = "DELETE FROM peminjaman WHERE id_peminjaman=" . $id;
    if (mysqli_query($mysqli, $query)) {
        $response = array(
            'status' => 1,
            'message' => 'Peminjaman Deleted Successfully.'
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Peminjaman Deletion Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
