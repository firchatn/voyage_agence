<?php
    require 'connection_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $r_id = rand(1000, 9999);
    $d = $_POST['date_sortie_id'];
    $nb = $_POST['nombre'];
    $p = $_POST['phone'];
    $n = $_POST['nom'];
    mysqli_query($db, "INSERT INTO reservation(id, date_sortie_id, nombre, phone, nom) values('$r_id', '$d', '$nb', '$p', '$n');");
    header("Location: /imprime.php?id=$r_id", 301);
}
?>
<!DOCTYPE html>
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
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <div class="content">


                <?php
require "connection_bd.php";
$id = $_GET['id'];
$resultat=mysqli_query($db, "select * from voyage where id=$id;");
$ligne=mysqli_fetch_array($resultat);
$dates=mysqli_query($db, "select * from date_sortie where voyage_id=$id;");
?>

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
     </tbody>
     </table>
     <form class="form-horizontal" method="post">
     <div class="form-group">
       <label class="control-label col-sm-3">Date de sortie</label>
         <div class="col-sm-9">
             <select class="form-control" name="date_sortie_id" required>
<?php while ($date=mysqli_fetch_array($dates)) { ?>
<option value="<?php echo $date['id'] ?>"><?php echo $date['date_sortie'] ?></option>
<?php } ?>
             </select>
         </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-3">Nombre de personnes</label>
         <div class="col-sm-9">
         <input class="form-control" type="number" min="1" max="<?php echo $ligne['nombre_places'] ?>" name="nombre" value="1" />
         </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-3">Nom et Prénom</label>
         <div class="col-sm-9">
             <input class="form-control" required name="nom" />
         </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-3">Téléphone</label>
         <div class="col-sm-9">
             <input class="form-control" required minlength=8 maxlength=14 name="phone" />
         </div>
     </div>
     <button class="btn btn-default col-sm-offset-3" href="reserve.php?id=<?php echo $id ?>">Confirmez</button>
     </form>

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
