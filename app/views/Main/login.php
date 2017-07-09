<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SingiDent Prijava</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo Configuration::BASE_URL; ?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="shortcut icon" href="<?php echo Configuration::BASE_URL; ?>assets/img/favicon.jpg"/>
    </head>
    <body>
        <main class="container">
            <div id="login">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 "> 
                        <img src="<?php echo Configuration::BASE_URL; ?>assets/img/logo4.jpg" class="img-fluid" id="pocetna" alt="SingiDent logo">
                        <form method="post" id="login-form" autocomplete="on">
                            <div class="form-group">
                                <label class="sr-only">Username</label>	
                                <input type="text" name="username" id="email" class="form-control" placeholder="Korisničko ime" required pattern="^[a-z]{4,}$">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Lozinka</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Lozinka" required pattern="^.{6,}$">
                            </div>
                            <?php if (isset($DATA['message'])): ?>
                                <h5 class="mb-4"><?php echo htmlspecialchars($DATA['message']); ?></h5>
                            <?php endif; ?>
                            <button type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="prijava">Prijavi se</button>
                        </form>
                        <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Zaboravili ste lozinku?</a>
                        <hr>
                    </div>
                </div>

            </div>

            <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Odustani</span>
                            </button>
                            <h4 class="modal-title">Slanje nove lozinke</h4>
                        </div>

                        <form method="post" >
                            <div class="modal-body">
                                <p>Unesite Vaš email</p>
                                <input type="email" name="recovery-email" id="recovery-email" class="form-control" required autocomplete="off" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$">
                            </div>
                            <div  class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                            <button type="submit" class="btn btn-custom" data-dismiss="modal">Pošalji</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </body>
</html>