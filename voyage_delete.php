<?php
require "connection_bd.php";
$id = $_GET['id'];
mysqli_query($db, "DELETE FROM voyage WHERE id=$id;");
header("Location: admin.php", 301);
