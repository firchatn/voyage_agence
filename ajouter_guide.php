<?php
require 'connection_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $n = $_POST['nom'];
    $id = $_POST['id'];
    $p = $_POST['prenom'];
    $e = $_POST['email'];
    $t = $_POST['phone'];
    $a = $_POST['agence_id'];

    $q =  "insert into guide (id, nom, prenom, email, phone, agence_id) values('$id', '$n', '$p', '$e', '$t', $a);";
    mysqli_query($db, $q);
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
    <h1>Ajouter Guide</h1>
    <br />
    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group"><label class="control-label col-sm-2">nom :        </label>
            <div class="col-sm-10"><input class="form-control" type="text" name="nom" required/></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">prénom :        </label>
            <div class="col-sm-10"><input class="form-control" type="text" name="prenom" required/></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">CIN :        </label>
            <div class="col-sm-10"><input class="form-control" type="text" name="id" maxlength=8 minlength=8 required/></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">email :       </label>
            <div class="col-sm-10"><input class="form-control" type="email" name="email" required/></div>
        </div>
        <div class="form-group"><label class="control-label col-sm-2">phone :   </label>
            <div class="col-sm-10"><input class="form-control" type="tel" name="phone" minlength=8 maxlength=14 required/></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Agence</label>
          <div class="col-sm-10">
            <select class="form-control" name="agence_id" required>
               <?php
               $agences=mysqli_query($db, "select * from agence;");
               while ($agence=mysqli_fetch_array($agences)) { ?>
               <option value="<?php echo $agence['id'] ?>"><?php echo $agence['pays'] . ', ' . $agence['ville']; ?></option>
               <?php } ?>
             </select>
         </div>
     </div>

        <button type="sumbit" class="btn btn-primary col-sm-offset-2"> Ajouter </button>

    </form>
</body>

</html>
