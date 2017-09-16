<?php require "connection_bd.php" ?>
<!DOCTYPE html>
<html lang="">

<head>
    <title>Travel Lovers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
                <li><i class="fa fa-phone"></i> +216 55 555 555</li>
                <li><i class="fa fa-envelope-o"></i> traverlovers.com</li>
                <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a href="login.php" title="Login"><i class="fa fa-lg fa-sign-in"></i></a></li>
            </ul>
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <!-- ################################################################################################ -->
            <div id="logo" class="fl_left">
                <h1><a href="index.html">Travel Lovers</a></h1>
            </div>
            <!-- ################################################################################################ -->
        </header>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- Top Background Image Wrapper -->
    <div class="bgded" style="background-image:url('images/demo/backgrounds/image.jpg');">
        <!-- ################################################################################################ -->
        <div class="wrapper row2">
            <nav id="mainav" class="hoc clear">
                <!-- ################################################################################################ -->
                <ul class="clear">
                    <li><a href="index.html">Acueill</a></li>
                    <li><a href="gallery.php">Voyage</a></li>
                    <li><a class="drop" href="voyage.php">Agence</a>
                        <ul>
<?php $resultat =(mysqli_query($db, "SELECT * FROM agence;"));
while ($agence =  mysqli_fetch_array($resultat)) {
?>
    <li><a href="#"><?php echo $agence['ville'] ?></a></li>
<?php } ?>

                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <!-- ################################################################################################ -->
            </nav>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <div class="wrapper overlay">
            <article id="pageintro" class="hoc clear">
                <!-- ################################################################################################ -->
                <h3 class="heading">Egestas vitae tincidunt ac dignissim</h3>
                <p>Posuere nisi in gravida nisl in est ligula tempus ut mollis quis tempus vitae orci morbi nulla tortor.</p>
                <footer><a class="btn" href="#">Eget risus aenean</a></footer>
                <!-- ################################################################################################ -->
            </article>
        </div>
        <!-- ################################################################################################ -->
    </div>
    <!-- End Top Background Image Wrapper -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
    </main>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper bgded" style="background-image:url('images/demo/backgrounds/image3.jpg');">
        <div class="hoc split clear">
            <section>
                <!-- ################################################################################################ -->
                <h2 class="heading">Nulla ultrices fusce</h2>
                <p class="btmspace-50">Purus dui dignissim vitae convallis et lacinia ultrices nunc mauris consequat faucibus leo at ornare aenean lorem ipsum convallis sed volutpat quis.</p>
                <ul class="nospace group elements">
                    <li>
                        <article><a href="#"><i class="fa fa-wpexplorer"></i></a>
                            <h6 class="heading">Habitasse platea dictumst</h6>
                            <p>Blandit tempor tortor quisque cursus ligula mi eu viverra lorem dapibus sit amet [&hellip;]</p>
                            <footer><a href="#">View Details &raquo;</a></footer>
                        </article>
                    </li>
                    <li>
                        <article><a href="#"><i class="fa fa-eye-slash"></i></a>
                            <h6 class="heading">Aliquam eu mi a lorem</h6>
                            <p>Fusce at dui eleifend risus lacinia hendrerit donec pretium id nulla non ornare [&hellip;]</p>
                        </article>
                    </li>
                </ul>
                <!-- ################################################################################################ -->
            </section>
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper bgded overlay coloured" style="background-image:url('images/demo/backgrounds/image2.jpg');">
        <section class="hoc container clear center">
            <div class="cta sectiontitle">
                <!-- ################################################################################################ -->
                <h3 class="heading"><strong>Molestie lobortis sed ut tempus lectus integer quis</strong></h3>
                <p class="btmspace-50">Nam in ante vel erat sodales feugiat et vel ex aliquam ut interdum nisl in hac habitasse platea dictumst.</p>
                <!-- ################################################################################################ -->
            </div>
        </section>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

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
