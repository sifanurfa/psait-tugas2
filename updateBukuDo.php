<?php

if(isset($_POST['submit']))
{    

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$id_buku = $_POST['id_buku'];


//Pastikan sesuai dengan pengarang endpoint dari REST API di ubuntu
$url='http://10.33.35.32/buku_api/buku_api.php?id_buku='.$id_buku.'';
$ch = curl_init($url);
//kirimkan data yang akan di update
$jsonData = array(
    'judul' =>  $judul,
    'pengarang' =>  $pengarang,
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

 