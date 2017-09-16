<?php
require 'connection_bd.php';
$v_id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $d = $_POST['date_sortie'];

    $q =  "insert into date_sortie (voyage_id, date_sortie, places_reserves) values('$v_id', '$d', 0);";
    mysqli_query($db, $q);
    header("Location: date_sortie.php?id=$v_id", true, 301);
}
$v = mysqli_fetch_array(mysqli_query($db, "select * from voyage where id=$v_id;"));
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <title>Admin</title>

</head>

<body class="container">
    <h1>Date sorties de <?php echo $v['nom']; ?></h1>
    <br />
    <ul>
<?php
$dates = mysqli_query($db, "select * from date_sortie where voyage_id=$v_id;");
while ($date=mysqli_fetch_array($dates)) { ?>
<li><?php echo $date['date_sortie'] ?></li>
<?php } ?>
    </ul>
    <h1>Ajouter Date Sortie</h1>
    <br />
    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group"><label class="control-label col-sm-2">Date :        </label>
            <div class="col-sm-10"><input class="form-control" type="text" name="date_sortie" placeholder="yyyy-mm-dd" /></div>
        </div>

        <button type="sumbit" class="btn btn-primary col-sm-offset-2"> Ajouter </button>

    </form>
</body>

</html>
