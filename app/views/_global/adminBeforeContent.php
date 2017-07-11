<?php ?>
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
                    <a class="navbar-brand" href="<?php echo Configuration::BASE_URL; ?>admin/" ><img src="<?php echo Configuration::BASE_URL; ?>assets/img/logo5.jpg" class="img-fluid" alt="logo" id="logo5"></a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo Configuration::BASE_URL; ?>admin/" id="active2"><h5>Zubari</h5><span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo Configuration::BASE_URL; ?>admin/uspele"><h5>Uspesne prijave</h5><span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo Configuration::BASE_URL; ?>admin/neuspele"><h5>Neuspesne prijave</h5><span class="sr-only">(current)</span></a>
                            </li>

                        </ul>


                        <a class="btn btn-outline-danger " href="<?php echo Configuration::BASE_URL; ?>adminlogout/" id="odjava"><span class="align-bottom">Odjava sa sistema</span></a>


                    </div>
                </nav>
            </div>
        </header>
        <main class="container">
            <div class="row">