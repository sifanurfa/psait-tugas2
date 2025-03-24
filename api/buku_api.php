<?php
require_once "config.php";
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
   case 'GET':
      if (!empty($_GET["id_buku"])) {
         $id = intval($_GET["id_buku"]);
         get_buku($id);
      } else {
         get_bukus();
      }
      break;

   case 'POST':
      if (!empty($_GET["id_buku"])) {
         $id = intval($_GET["id_buku"]);
         update_buku($id);
      } else {
         insert_buku();
      }
      break;

   case 'DELETE':
      $id = intval($_GET["id_buku"]);
      delete_buku($id);
      break;

   default:
      // Invalid Request Method
      header("HTTP/1.0 405 Method Not Allowed");
      break;
}

function get_bukus()
{
    global $mysqli;
    $query = "SELECT * FROM buku";
    $data = array();
    $result = $mysqli->query($query);
    if ($result) {
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get List Buku Successfully.',
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Failed to fetch buku list.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function get_buku($id = 0)
{
    global $mysqli;
    $query = "SELECT * FROM buku";
    if ($id != 0) {
        $query .= " WHERE id_buku=" . $id . " LIMIT 1";
    }
    $data = array();
    $result = $mysqli->query($query);
    if ($result) {
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get Buku Successfully.',
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Failed to fetch buku.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert_buku()
{
    global $mysqli;
    if (!empty($_POST["judul"])) {
        $data = $_POST;
    } else {
        $data = json_decode(file_get_contents('php://input'), true);
    }

    $arrcheckpost = array('judul' => '', 'pengarang' => '');
    $hitung = count(array_intersect_key($data, $arrcheckpost));
    if ($hitung == count($arrcheckpost)) {
        $result = mysqli_query($mysqli, "INSERT INTO buku SET
            judul = '$data[judul]',
            pengarang = '$data[pengarang]'");

        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Buku Added Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Buku Addition Failed.'
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

function update_buku($id)
{
    global $mysqli;
    if (!empty($_POST["judul"])) {
        $data = $_POST;
    } else {
        $data = json_decode(file_get_contents('php://input'), true);
    }

    $arrcheckpost = array('judul' => '', 'pengarang' => '');
    $hitung = count(array_intersect_key($data, $arrcheckpost));
    if ($hitung == count($arrcheckpost)) {
        $result = mysqli_query($mysqli, "UPDATE buku SET
            judul = '$data[judul]',
            pengarang = '$data[pengarang]'
            WHERE id_buku='$id'");

        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Buku Updated Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Buku Updation Failed.'
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

function delete_buku($id)
{
    global $mysqli;
    $query = "DELETE FROM buku WHERE id_buku=" . $id;
    if (mysqli_query($mysqli, $query)) {
        $response = array(
            'status' => 1,
            'message' => 'Buku Deleted Successfully.'
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Buku Deletion Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>
