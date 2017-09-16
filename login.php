<?php
require 'connection_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $u=$_POST['username'];
    $p=$_POST['password'];
    $resultat=mysqli_query($db, "select * from admin where username = '$u' and password = '$p';");
    if ($resultat && $resultat->num_rows > 0) {
        echo " $u welcome";
        header("Location: admin.php", true, 301);
    } else {
        $feedback = "Erreur d'authentification";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin</title>
    <link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        form {
            border: 3px solid #f1f1f1;
            width: 500px;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        h1 {
            background-color: pink;
            width: 500px;
            color: white;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }
        /* Change styles for span and cancel button on extra small screens */

        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body class="container">


    <center>
        <h1>welcome to admin page !!! </h1>

        <form method="post" action="login.php">
<?php if (isset($feedback)) { ?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <?php echo $feedback; ?>
</div>
<?php } ?>
        <div class="form-group">
            <label class="control-label">username :</label>
            <input type="text" name="username" class="form-control" />
        </div>
        <div class="form-group">
            <label class="control-label">password :</label>
            <input type="password" name="password" class="form-control" />
        </div>


            <button class="btn btn-lg" type="sumbit"> accces </button>

        </form>
    </center>
</body>

</html>
