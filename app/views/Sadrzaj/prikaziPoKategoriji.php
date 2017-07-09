<?php require_once './app/views/_global/beforeContent.php'; ?>
<nav class="list-group col-12 col-sm-12 col-md-3 col-lg-2">
    <a href="<?php echo Configuration::BASE_URL;?>usluge/" class="list-group-item">SVE</a>
    <?php
    
        if (is_array($DATA['kategorija']))
            foreach ($DATA['kategorija'] as $kategorija):
                
                ?>
    <a href="<?php echo Configuration::BASE_URL;?>usluge/prikaziPoKategoriji/<?php echo $kategorija->kategorija_id?>" class="list-group-item"><?php echo $kategorija->vrsta ?></a>
    <?php endforeach; ?>
    <a href="<?php echo Configuration::BASE_URL;?>kategorije/" class="list-group-item">Uredi kategorije</a>
</nav>

<table class="table table-bordered table-striped table-responsive col-12 col-md-9 col-lg-10" id="tableheight">
    <thead>
        <tr>
            <th class="text-center">Naziv</th>
            <th class="text-center">Kataloški broj</th>
            <th class="text-center">Cena</th>
            <th class="text-center">Cena<br>sa<br>popustom</th>
            <th class="text-center" rowspan="2"><a href='<?php echo Configuration::BASE_URL;?>usluga/dodaj/' class="btn btn-success">Dodaj uslugu &#10010;</a></th>
        </tr>

    </thead>
    <tbody>

        <?php
        $temp = $DATA['uslugepokategoriji'];
        //var_dump($DATA['uslugepokategoriji']);
//        if(empty($DATA['uslugepokategoriji'])){
//            $temp = $DATA['poruka'];
//        }
        if (is_array($temp))
            foreach ($temp as $listaUslugaPoKateoriji):
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $listaUslugaPoKateoriji->naziv;?><br>
                        <a class="btn btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $listaUslugaPoKateoriji->usluga_id;?>">Opis</a>
                        <div class="modal fade" id="myModal<?php echo $listaUslugaPoKateoriji->usluga_id;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" id="<?php echo $listaUslugaPoKateoriji->usluga_id;?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title">OPIS</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $listaUslugaPoKateoriji->opis ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                    <td class="text-center"><?php echo $listaUslugaPoKateoriji->kataloski_broj ?></td>
                    <td class="text-center"><?php echo $listaUslugaPoKateoriji->cena ?></td>
                    <td class="text-center"><?php echo $listaUslugaPoKateoriji->cena_sa_popustom    ?></td>
                    
                    <td class="text-nowrap">
                        <a href="<?php echo Configuration::BASE_URL;?>usluga/izmeni/<?php echo $listaUslugaPoKateoriji->usluga_id ?>" class="btn btn-warning">Izmeni</a>
                        <a href="<?php echo Configuration::BASE_URL;?>usluga/ukloni/<?php echo $listaUslugaPoKateoriji->usluga_id ?>" class="btn btn-danger">Ukloni</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?php require_once 'app/views/_global/afterContent.php';?>