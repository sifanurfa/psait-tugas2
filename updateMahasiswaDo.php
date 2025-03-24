<?php

if(isset($_POST['submit']))
{    

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$id_mhs = $_POST['id_mhs'];


//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://10.33.35.32/sait_project_api/mahasiswa_api.php?id_mhs='.$id_mhs.'';
$ch = curl_init($url);
//kirimkan data yang akan di update
$jsonData = array(
    'nama' =>  $nama,
    'alamat' =>  $alamat,
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

$result = curl_exec($ch);
$result = json_decode($result, true);
curl_close($ch);

//var_dump($result);
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 echo "<br>Sukses mengupdate data di ubuntu server !";
 echo "<br><a href=selectMahasiswaView.php> OK </a>";
}
?>

 