<?php
$Request = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $DATA['naslov']; ?></title>
        <!-- Bootstrap CSS -->
        <link rel="shortcut icon" href="<?php echo Configuration::BASE_URL; ?>assets/img/favicon.jpg"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo Configuration::BASE_URL; ?>assets/css/style.css" type="text/css">
    </head>
    <body>
        <header class="jumbotron">
            <div class="container">
                <nav class="navbar navbar-toggleable-md navbar-light">
                    <a class="navbar-brand" href="<?php echo Configuration::BASE_URL; ?>usluge/" ><img src="<?php echo Configuration::BASE_URL; ?>assets/img/logo5.jpg" class="img-fluid" alt="logo" id="logo5"></a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <?php
                            if ($Request == "/zubar/pacijenti/" || $Request == "/zubar/pacijenti") {
                                echo '<li class="nav-item">';
                                echo '<a aria-pressed="true" class="nav-link" href="' . Configuration::BASE_URL . 'usluge/"><h5>Uređivanje sadržaja</h5><span class="sr-only">(current)</span></a>';
                                echo '</li>';
                                echo '<li class="nav-item">';
                                echo '<a aria-pressed="true" class="nav-link" href="' . Configuration::BASE_URL . 'pacijenti/" id="active"><h5>Elektronski kartoni pacijenata</h5><span class="sr-only">(current)</span></a>';
                                echo '</li>';
                            } else {
                                echo '<li class="nav-item">';
                                echo '<a aria-pressed="true" class="nav-link" href="' . Configuration::BASE_URL . 'usluge/" id="active"><h5>Uređivanje sadržaja</h5><span class="sr-only">(current)</span></a>';
                                echo '</li>';
                                echo '<li class="nav-item">';
                                echo '<a aria-pressed="true" class="nav-link" href="' . Configuration::BASE_URL . 'pacijenti/"><h5>Elektronski kartoni pacijenata</h5><span class="sr-only">(current)</span></a>';
                                echo '</li>';
                            }
                            //<?php echo Configuration::BASE_URL; 
                            ?>

                            <!--                            <li class="nav-item">
                                                            <a class="nav-link" href="UBACI OVO GOREusluge/" id="active">Uređivanje sadržaja<span class="sr-only">(current)</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="UBACI OVO GOREpacijenti/">Elektronski kartoni pacijenata</a>
                                                        </li>-->
                        </ul>


                        <a class="btn btn-outline-danger " href="<?php echo Configuration::BASE_URL; ?>logout/" id="odjava"><span class="align-bottom">Odjava sa sistema</span></a>


                    </div>
                </nav>
            </div>
        </header>
        <main class="container">
            <div class="row">

