<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <title>Admin</title>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .panel-heading {
            color: white;
            background-color: pink;
            text-align: center;
            border: solid;
            border-color: pink;
        }
        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body class="container">

    <h1>Page d'administration</h1>

<br/>
        <ul class="list-unstyled">
            <li><a class="btn btn-link" href="ajouter_voyage.php"><i class="fa fa-plus-circle"></i> Ajouter voyage</a></li>
            <li><a class="btn btn-link" href="ajouter_guide.php"><i class="fa fa-plus-circle"></i> Ajouter guide</a></li>
        </ul>
    <div id="adminss" style="text-align: left">
    </div>


    <center>
    <div class="panel">
        <div class="panel-heading">
            <center><h4>liste des Voyages</h4></center>
        </div>
                <table id='customers' class="table table-bordered  table-hover text-capitalize">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Pays</th>
                            <th>Ville</th>
                            <th>Prix</th>
                            <th>N° Places</th>
                            <th>Duré</th>
                            <th>Guide</th>
                            <th>&nbsp;</th>
                            <tr>
                    </thead>
                    <tbody>
                        <?php
require "connection_bd.php";
$resultat=mysqli_query($db, "select * from voyage;");
while ($ligne=mysqli_fetch_array($resultat)) {
    ?>
                            <tr>
                                <td>
                                    <?php echo $ligne['nom']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['pays']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['ville']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['prix']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['nombre_places']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['dure']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['guide_id']; ?>
                                </td>
                                <td class="text-center">
                                <a class="text-primary" href="date_sortie.php?id=<?php echo $ligne['id'] ?>"><i class="fa fa-clock-o"></i></a>
                                &nbsp;&nbsp;
                                <a class="text-danger" href="voyage_delete.php?id=<?php echo $ligne['id'] ?>"><i class="fa fa-trash"></i></a>
                                </td>
                                <tr>
                                    <?php
} ?>
       <tr><td colspan=8 class="text-center"><a href="ajouter_voyage.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ajouter</a></td></tr>
                    </tbody>
                </table>
                </div>
                <br />
    <div class="panel">
        <div class="panel-heading">
            <center><h4>liste des Guides</h4></center>
        </div>
                <table id='customers' class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                            <th>CIN</th>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>ville</th>
                            <th>pays</th>
                            <th>&nbsp;</th>
                            <tr>
                    </thead>
                    <tbody>
                        <?php
require "connection_bd.php";
$resultat=mysqli_query($db, "select g.nom as nom, g.prenom as prenom, g.email as email, g.phone as phone, g.id as id, a.ville as ville, a.pays as pays from guide g, agence a where g.agence_id = a.id;");
while ($ligne=mysqli_fetch_array($resultat)) {
    ?>
                            <tr>
                                <td>
                                    <?php echo $ligne['id']; ?>
                                </td>
                                <td class="text-capitalize">
                                    <?php echo $ligne['nom']; ?>
                                </td>
                                <td class="text-capitalize">
                                    <?php echo $ligne['prenom']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['email']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['phone']; ?>
                                </td>
                                <td class="text-capitalize">
                                    <?php echo $ligne['ville']; ?>
                                </td>
                                <td class="text-capitalize">
                                    <?php echo $ligne['pays']; ?>
                                </td>
                                <td class="text-center">
                                <a class="text-danger" href="guide_delete.php?id=<?php echo $ligne['id'] ?>"><i class="fa fa-trash"></i></a>
                                </td>
                                <tr>
                                    <?php
} ?>
       <tr><td colspan=8 class="text-center"><a href="ajouter_guide.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ajouter</a></td></tr>
                    </tbody>
                </table>
                </div>
</body>

</html>
