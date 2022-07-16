<?php
include "../connection.php";
$id = $_POST['ID_LOKASI'];
$nama_bencana = $_POST['NAMA_BENCANA'];
$lokasi = $_POST['LOKASI'];
$jumlah_korban = $_POST['JUMLAH_KORBAN'];
$total_donasi = $_POST['TOTAL_DONASI'];
$sql = ociparse(
    $conn, 
    "UPDATE LOKASI_BENCANA SET NAMA_BENCANA='$nama_bencana', LOKASI='$lokasi', JUMLAH_KORBAN='$jumlah_korban', TOTAL_DONASI='$total_donasi' WHERE ID_LOKASI='$id'"
);
ociexecute($sql);
header("location: index.php");
