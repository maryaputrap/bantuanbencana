<?php
include "../connection.php";
$id = $_GET['ID_LOKASI'];
$sql = ociparse($conn, "DELETE LOKASI_BENCANA WHERE ID_LOKASI='$id'");
ociexecute($sql);
header("location: index.php");
