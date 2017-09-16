<?php
require 'connection_bd.php';
$id = $_GET['id'];
$r=mysqli_fetch_array(mysqli_query($db, "select * from reservation where id=$id ;"));
$d_id = $r['date_sortie_id'];
$v=mysqli_fetch_array(mysqli_query($db, "select * from date_sortie d, voyage v where d.id = ${d_id} and v.id = d.voyage_id;"));
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Imrpime</title>
<link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container" style="border: 1px solid black;">
    <p class="col-xs-12">&nbsp;</p>
    <p class="col-xs-12">&nbsp;</p>
    <p class="col-xs-12">&nbsp;</p>
    <div class="col-xs-5 text-center">
      <p><b>Agance Travel Lovers</b></p>
      <p>Adresse: Rt Matar, km 5, Sfax, Tunisie</p>
      <p>Tél: +216 24 156 451</p>
      <p>Email: agencetravel@gmail.com</p>
    </div>
    <div class="col-xs-5 text-center col-xs-offset-2">
      <p><b><?php echo $r['nom'] ?></b></p>
      <p>Tél: <?php echo $r['phone'] ?></p>
      <p>Réservation: <b>#</b><?php echo $id ?></p>
    </div>

    <p class="col-xs-12">&nbsp;</p>
    <p class="col-xs-12">&nbsp;</p>
    <p class="col-xs-12">&nbsp;</p>
    <div class=" col-xs-8 col-xs-offset-2">
    <table class="table table-bordered">
      <tbody>
        <tr><td><b>Voyage</b></td><td><?php echo $v['nom'] . ' (' . $v['pays'] . ', ' . $v['ville'] . ')' ?></td></tr>
        <tr><td><b>Date sortie</b></td><td><?php echo $v['date_sortie'] ?></td></tr>
        <tr><td><b>Prix individu</b></td><td><?php echo $v['prix'] ?> TND</td></tr>
        <tr><td><b>Place résérvés</b></td><td><?php echo $r['nombre'] ?> places</td></tr>
        <tr><td><b>Prix</b></td><td><?php echo $v['prix'] * $r['nombre'] ?> TND</td></tr>
        <tr><td><b>Prix avec TVA</b></td><td><?php echo $v['prix'] * $r['nombre'] * 1.17 ?> TND</td></tr>
      </tbody>
    </table>
  </div>
    <p class="col-xs-12">&nbsp;</p>
    <p class="col-xs-12">&nbsp;</p>
    <p class="col-xs-12 text-center text-muted">Agence Travel Lovers - +216 24 156 451 - agencetravel@gmail.com</p>
    <p class="col-xs-12">&nbsp;</p>

</body>
</html>
