<?php
include "../connection.php";
$user = $_GET['ID_USER'];
$sql = ociparse($conn, "DELETE USER_DONASI WHERE ID_USER='$user'");
ociexecute($sql);
header("location: index.php");?>
