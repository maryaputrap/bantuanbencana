<?php
include "../connection.php";
$id_lokasi = $_POST['ID_LOKASI'];
$nama = $_POST['NAMA'];
$telepon = $_POST['TELEPON'];
$jumlah_donasi = $_POST['JUMLAH_DONASI'];
$count = ociparse($conn, "SELECT MAX(ID_USER) FROM USER_DONASI");
ociexecute($count);
while (($row = oci_fetch_row($count)) != false) {
   $countRow = $row[0];
}
$countRow++;
$sql = ociparse(
    $conn, 
    "INSERT INTO USER_DONASI VALUES ('$countRow',$id_lokasi,'$nama',$telepon,$jumlah_donasi)"
);
ociexecute($sql);
header("location: index.php");?>