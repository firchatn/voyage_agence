<?php
require 'connection_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomPhoto=$_FILES['img']['name'];
    $file_tmp_name=$_FILES['img']['tmp_name'];

    $n = $_POST['nom'];
    $d = $_POST['description'];
    $p = $_POST['prix'];
    $nb = $_POST['nombre_places'];
    $v = $_POST['ville'];
    $pa = $_POST['pays'];
    $du = $_POST['dure'];
    $g = $_POST['guide_id'];

    $q =  "insert into voyage (nom, description, prix, nombre_places, ville, pays, dure, image, guide_id) values('$n', '$d', '$p', '$nb', '$v', '$pa', '$du', 'images/$nomPhoto', '$g');";
    mysqli_query($db, $q);
    move_uploaded_file($file_tmp_name, "images/$nomPhoto");
    header("Location: admin.php", true, 301);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <title>Admin</title>

</head>

<body class="container">
    <h1>Ajouter Voyage</h1>
    <br />
    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group"><label class="control-label col-sm-2">nom :        </label>
            <div class="col-sm-10"><input class="form-control" type="text" name="nom" required /></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">description :        </label>
            <div class="col-sm-10"><textarea class="form-control" type="text" name="description" required></textarea></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">prix (TND):       </label>
            <div class="col-sm-10"><input class="form-control" type="number" name="prix" required min=10/></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">nombre de  places :   </label>
            <div class="col-sm-10"><input class="form-control" type="number" name="nombre_places" required min=1/></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">Pays de distination :</label>
            <div class="col-sm-10"><input class="form-control" type="text" name="pays" required /></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">Ville de distination :</label>
            <div class="col-sm-10"><input class="form-control" type="text" name="ville" required /></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">dureé (jours):      </label>
            <div class="col-sm-10"><input class="form-control" type="number" name="dure" required min=1/></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">imgage :        </label>
            <div class="col-sm-10"><input class="form-control" id="img" name="img" type="file" required /></div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Guide</label>
          <div class="col-sm-10">
            <select class="form-control" name="guide_id" required>
               <?php
               $guides=mysqli_query($db, "select * from guide;");
               while ($guide=mysqli_fetch_array($guides)) { ?>
               <option value="<?php echo $guide['id'] ?>"><?php echo $guide['nom'] . ' ' . $guide['prenom']; ?></option>
               <?php } ?>
             </select>
         </div>
     </div>

        <button type="sumbit" class="btn btn-primary col-sm-offset-2"> Ajouter </button>

    </form>
</body>

</html>
