<?php require_once './app/views/_global/beforeContent.php'; ?>

<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" id="active2"><h6>Elektronski kartoni pacijenata</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>intervencije/"><h6>Pogledaj sve intervencije</h6><span class="sr-only">(current)</span></a>
</li>

</ul>

<a class="btn btn-outline-danger " href="<?php echo Configuration::BASE_URL; ?>logout/" id="odjava"><span class="align-bottom">Odjava sa sistema</span></a>

</div>
</nav>
</div>
</header>
<main class="container">
    <div class="row">
        <div class="panel panel-default col-12"> <div class="panel-heading">Izvestaj</div>
            <table class="table"> 
                <thead> 
                    <tr> 
                        <th>#</th> 
                        <th>Zub</th> 
                        <th>Usluga</th> 
                        <th>Cena</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php
                    $i = 1;
                    for ($j = 0; $j < count($DATA['zubi']); $j++):
                        if ($DATA['kategorija'] == 'odrasli') {
                            ?>
                            <tr> 
                                <th scope="row"><?php echo $i++ ?></th> 
                                <td> <?php echo $DATA['zubi'][$j] ?></td> 
                                <td> <?php echo $DATA['usluge'][$j]->naziv ?></td> 
                                <td> <?php echo $DATA['usluge'][$j]->cena ?>€</td> 
                            </tr>
                        <?php } else { ?>
                            <tr> 
                                <th scope="row"><?php echo $i++ ?></th> 
                                <td> <?php echo $DATA['zubi'][$j] ?></td> 
                                <td> <?php echo $DATA['usluge'][$j]->naziv ?></td> 
                                <td> <?php echo $DATA['usluge'][$j]->cena_sa_popustom ?>€</td> 
                            </tr>
                        <?php }
                        ?>
                        <?php
                    endfor;
                    ?>
                    <tr> 
                        <th colspan="3" class="desno">Ukupno:</th> 
                        <td><?php echo $DATA['ukupno'] ?>€</td>
                    </tr>
                </tbody> 
            </table>
            <div class="desno">

                <form method="post" action="<?php echo Configuration::BASE_URL; ?>pregled/<?php echo $DATA['pacijent']->pacijent_id ?>">

                    <input type="hidden" name="confirmed" value="1">
                    <!--            <button type="submit" class="btn btn-primary razmak">Poništi</button>-->
                    <button onClick="window.print()" class="btn btn-primary razmak">Štampa računa</button>
                </form>

            </div>
        </div>
        <?php require_once './app/views/_global/afterContent.php'; ?>