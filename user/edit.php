<?php
include "../connection.php";
$user = $_POST['ID_USER'];
$id = $_POST['ID_LOKASI'];
$nama = $_POST['NAMA'];
$telepon = $_POST['TELEPON'];
$jumlah_donasi = $_POST['JUMLAH_DONASI'];
$sql = ociparse(
    $conn, 
    "UPDATE USER_DONASI SET ID_LOKASI='$id', NAMA='$nama', TELEPON='$telepon', JUMLAH_DONASI='$jumlah_donasi' WHERE ID_USER='$user'"
);
ociexecute($sql);
header("location: index.php");?>
