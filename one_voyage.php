<?php
require "connection_bd.php";
$id = $_GET['id'];
$resultat=mysqli_query($db, "select * from voyage where id=$id;");
$ligne=mysqli_fetch_array($resultat);
$dates=mysqli_query($db, "select * from date_sortie where voyage_id=$id;");
?>
<!DOCTYPE html>
<!--
Template Name: Drywest
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->

<head>
    <title>Drywest | Pages | Full Width</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

<body id="top">
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
            <!-- ################################################################################################ -->
            <ul>
                <li><i class="fa fa-clock-o"></i> Mon. - Fri. 8am - 5pm</li>
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
                <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a href="#" title="Login"><i class="fa fa-lg fa-sign-in"></i></a></li>
                <li><a href="#" title="Sign Up"><i class="fa fa-lg fa-edit"></i></a></li>
            </ul>
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <div class="content">



         <!-- ################################################################################################ -->
         <img class="imgr borderedbox inspace-5 img-responsive" src="<?php echo $ligne['image'] ?>" alt="" style="width:100%">
     <h1><?php echo $ligne['nom'] ?> </h1>
     <p class=""><?php echo $ligne['description'] ?></p>
     <br />
     <table class="table">
     <tbody>
     <tr><td>Pays</td><td><?php echo $ligne['pays'] ?></td></tr>
     <tr><td>Ville</td><td><?php echo $ligne['ville'] ?></td></tr>
     <tr><td>Prix</td><td><?php echo $ligne['prix'] ?> TND</td></tr>
     <tr><td>Duré</td><td><?php echo $ligne['dure'] ?> jours</td></tr>
     <tr><td>Nombre de places</td><td><?php echo $ligne['nombre_places'] ?> personnes</td></tr>
     <tr><td>Dates sorties</td>
     <td><ul class="list-unstyled">
<?php while ($date=mysqli_fetch_array($dates)) { ?>
<li><?php echo $date['date_sortie'] ?></li>
<?php } ?>
     </ul></td></tr>
     </tbody>
     </table>
     <a class="btn btn-default" href="reserve.php?id=<?php echo $id ?>">Réservez</a>

            </div>
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
            <!-- JAVASCRIPTS -->
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery.backtotop.js"></script>
            <script src="js/jquery.mobilemenu.js"></script>
</body>

</html>
