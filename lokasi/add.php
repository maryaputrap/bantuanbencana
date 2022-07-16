<?php
include "../connection.php";
$nama_bencana = $_POST['NAMA_BENCANA'];
$lokasi = $_POST['LOKASI'];
$jumlah_korban = $_POST['JUMLAH_KORBAN'];
$total_donasi = $_POST['TOTAL_DONASI'];
$count = ociparse($conn, "SELECT MAX(ID_LOKASI) FROM LOKASI_BENCANA");
ociexecute($count);
while (($row = oci_fetch_row($count)) != false) {
   $countRow = $row[0];
}
$countRow++;
$sql = ociparse(
    $conn, 
    "INSERT INTO LOKASI_BENCANA VALUES ('$countRow','$nama_bencana','$lokasi',$jumlah_korban,$total_donasi)"
);
ociexecute($sql);
header("location: index.php");