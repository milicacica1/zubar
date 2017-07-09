
<?php require_once './app/views/_global/beforeContent.php'; ?>

<section class="blabla">
    <div class="bla">
        <form method="post" action="<?php echo Configuration::BASE_URL; ?>pregled/<?php echo $DATA['pacijent']->pacijent_id ?>">
            <div class="dolejedan"><input type="checkbox" class="check" name="check_list[]" value="31"></div>
            <div class="doledva"><input type="checkbox" class="check" name="check_list[]" value="32"></div>
            <div class="doletri"><input type="checkbox" class="check" name="check_list[]" value="33"></div>
            <div class="dolecetiri"><input type="checkbox" class="check" name="check_list[]" value="34"></div>
            <div class="dolepet"><input type="checkbox" class="check" name="check_list[]" value="35"></div>
            <div class="dolesest"><input type="checkbox" class="check" name="check_list[]" value="36"></div>
            <div class="dolesedam"><input type="checkbox" class="check" name="check_list[]" value="37"></div>
            <div class="doleosam"><input type="checkbox" class="check" name="check_list[]" value="38"></div>
            <div class="doledevet"><input type="checkbox" class="check" name="check_list[]" value="41"></div>
            <div class="doledeset"><input type="checkbox" class="check" name="check_list[]" value="42"></div>
            <div class="dolejedanaest"><input type="checkbox" class="check" name="check_list[]" value="43"></div>
            <div class="doledvanaest"><input type="checkbox" class="check" name="check_list[]" value="44"></div>
            <div class="doletrinaest"><input type="checkbox" class="check" name="check_list[]" value="45"></div>
            <div class="dolecetrnaest"><input type="checkbox" class="check" name="check_list[]" value="46"></div>
            <div class="dolepetnaest"><input type="checkbox" class="check" name="check_list[]" value="47"></div>
            <div class="dolesesnaest"><input type="checkbox" class="check" name="check_list[]" value="48"></div>
            <div class="jedan"><input type="checkbox" class="check" name="check_list[]" value="28"></div>
            <div class="dva"><input type="checkbox" class="check" name="check_list[]" value="27"></div>
            <div class="tri"><input type="checkbox" class="check" name="check_list[]" value="26"></div>
            <div class="cetiri"><input type="checkbox" class="check" name="check_list[]" value="25"></div>
            <div class="pet"><input type="checkbox" class="check" name="check_list[]" value="24"></div>
            <div class="sest"><input type="checkbox" class="check" name="check_list[]" value="23"></div>
            <div class="sedam"><input type="checkbox" class="check" name="check_list[]" value="22"></div>
            <div class="osam"><input type="checkbox" class="check" name="check_list[]" value="21"></div>
            <div class="devet"><input type="checkbox" class="check" name="check_list[]" value="11"></div>
            <div class="deset"><input type="checkbox" class="check" name="check_list[]" value="12"></div>
            <div class="jedanaest"><input type="checkbox" class="check" name="check_list[]" value="13"></div>
            <div class="dvanaest"><input type="checkbox" class="check" name="check_list[]" value="14"></div>
            <div class="trinaest"><input type="checkbox" class="check" name="check_list[]" value="15"></div>
            <div class="cetrnaest"><input type="checkbox" class="check" name="check_list[]" value="16"></div>
            <div class="petnaest"><input type="checkbox" class="check" name="check_list[]" value="17"></div>
            <div class="sesnaest"><input type="checkbox" class="check" name="check_list[]" value="18"></div>
            <div class="potvrda">
                <button type="submit" class="dugmePotvrda" >Označite zube</button> 
                <h1 class="vilica1">1</h1>
                <h1 class="vilica2">2</h1>
                <h1 class="vilica3">4</h1>
                <h1 class="vilica4">3</h1>
            </div>
        </form>


    </div>
</section>
<div class="col-12 col-md-12 col-lg-7">
    <h3 id="pacijent">Pacijent:</h3> 
    <div id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="headingOne">
                <h5 class="mb-0">

                    <a data-toggle = "collapse" data-parent = "#accordion" href = "#col1" aria-expanded = "true" aria-controls = "col1">
                        <?php
                        echo $DATA['pacijent']->ime;
                        echo ' ';
                        echo $DATA['pacijent']->prezime;
                        ?>
                    </a>

                </h5>
            </div>
            <div id="col1" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                    <!--                    <div class="row">-->
                    <img  class="img img-thumbnail" alt="profil slika"  src="<?php echo Configuration::BASE_URL; ?>assets/img/profil/<?php echo $DATA['pacijent']->pacijent_id; ?>.jpg">
                    <ul>
                        <li><h6><?php echo $DATA['pacijent']->ime;
                        echo '  ';
                        echo $DATA['pacijent']->prezime; ?></h6></li>
                        <li><h6><?php echo $DATA['pacijent']->datum_rodjenja; ?></h6></li>
                        <li><h6><?php echo $DATA['pacijent']->jmbg; ?></h6></li>
                        <li><h6><?php echo $DATA['pacijent']->email; ?></h6></li>
                        <li><h6><?php echo $DATA['pacijent']->telefon; ?></h6></li>
                        <li><h6>Alergije : <?php echo $DATA['pacijent']->alergije; ?></h6></li>

                    </ul>

<!--                        <table class="oPacijentu">
    <tr>
        <th>Ime</th>
        <th>Prezime</th> 
        <th>Godine</th>
    </tr>
    <tr>
        <td><?php //echo $DATA['pacijent']->ime;  ?></td>
        <td><?php //echo $DATA['pacijent']->prezime;  ?></td> 
        <td><?php //echo $DATA['pacijent']->datum_rodjenja;  ?></td>
    </tr>
    <tr>
        <td><?php echo $DATA['pacijent']->jmbg; ?></td>
        <td>Nema alergije</td>
        <td>student</td> 
    </tr>
</table>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <a href = "<?php echo Configuration::BASE_URL;?>pacijenti/" class="btn btn-warning">Odustani</a>
    <div class="row col-12">
        <?php
        if (!isset($_POST['check_list'])) {
            
        } else{
            //foreach ($_POST['check_list'] as $checkbox) :
                //PregledModel::setZubi($checkbox);
                //$this->setDa
                ?><div class="zubi col-lg-6">
                    <form method="post" action="<?php echo Configuration::BASE_URL; ?>racun/<?php echo $DATA['pacijent']->pacijent_id ?>"">
        <?php           foreach ($_POST['check_list'] as $checkbox) :
            ?>

                            <h3>Zub - <?php echo $checkbox ?></h3>
            <!--                <input hidden checked type="checkbox" name="check_List[]" value="<?php //echo $checkbox ?>">-->
                            <?php
                            // foreach ($DATA['kategorija'] as $kategorija):
                            //  echo '<h5>' . $kategorija->vrsta . '</h5>';
                            foreach ($DATA['pregledi'] as $pregled):

                                //  if ($pregled->vrsta == $kategorija->vrsta) {
                                echo '<input type="checkbox" class="check2" name = "check_List[]" value="' . $checkbox . '_' . $pregled->usluga_id . '"/>' . $pregled->naziv . '<br />';
                                // }

                            endforeach;
                            ?>
                            <?php //endforeach; ?>

        <?php endforeach;
         ?>
                        <button type="submit" class="btn btn-primary razmak" >Potvrdi</button>
                    </form>
        </div><?php }?>
<!--                <div class="zubi col-lg-6">
                    <form>
                        <h3>Zub - <?php //echo $checkbox  ?></h3>
                        <h5>Preventiva</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Redovna</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Hirurgija</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Protetika</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                    </form>
                </div>

                <button type="submit" class="btn btn-primary razmak" >Potvrdi</button>-->

       
        <!--        <div class="zubi col-lg-6">
                    <form>
                        <h3>Zub - 1-2</h3>
                        <h5>Preventiva</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Redovna</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Hirurgija</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Protetika</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                    </form>
                </div>
                <div class="zubi col-lg-6">
                    <form>
                        <h3>Zub - 3-6</h3>
                        <h5>Preventiva</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Redovna</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Hirurgija</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                        <h5>Protetika</h5>
                        <input type="checkbox" class="check2"/> Pregled 1 <br />
                        <input type="checkbox" class="check2"/> Pregled 2 <br />
                        <input type="checkbox" class="check2"/> Pregled 3 <br />
                        <input type="checkbox" class="check2"/> Pregled 4 <br />
                        <input type="checkbox" class="check2"/> Pregled 5 <br />
                    </form>
                </div>
            </div>-->
        <!--            <button type="submit" class="btn btn-primary razmak" >Potvrdi</button>-->
    </div>  
</div>
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
            <tr> 
                <th scope="row">1</th> 
                <td>2-1</td> 
                <td>Uklanjanje zubnog kamenca</td> 
                <td>20€</td> 
            </tr> 
            <tr> 
                <th scope="row">2</th> 
                <td>3-6</td> 
                <td>Metalo-keramička kruna</td> 
                <td>80€</td> 
            </tr> 
            <tr> 
                <th colspan="3" class="desno">Ukupno:</th> 
                <td>100€</td>
            </tr>
        </tbody> 
    </table>
    <div class="desno">
        <button type="submit" class="btn btn-primary razmak">Štampa računa</button>
        <button type="submit" class="btn btn-primary razmak">Poništi</button>
    </div>
    <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card" id="dole">
            <div class="card-header" role="tab" id="heading1">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#col2" aria-expanded="true" aria-controls="col2">
                        Istorija pacijenta
                    </a>
                </h5>
            </div>
            <div id="col2" class="collapse" role="tabpanel" aria-labelledby="heading1">
                <div class="card-block">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th>Zub</th>
                                <th>Datum</th> 
                                <th>Usluga</th>
                            </tr>
                            <tr>
                                <td>2-1</td>
                                <td>23/03/2017/</td> 
                                <td>Livena nadogradnja</td>
                            </tr>
                            <tr>
                                <td>2-1</td>
                                <td>23/03/2017/</td> 
                                <td>Livena nadogradnja</td> 
                            </tr>
                            <tr>
                                <td>2-1</td>
                                <td>23/03/2017/</td> 
                                <td>Livena nadogradnja</td> 
                            </tr>
                            <tr>
                                <td>2-1</td>
                                <td>23/03/2017/</td> 
                                <td>Livena nadogradnja</td> 
                            </tr>
                            <tr>
                                <td>2-1</td>
                                <td>23/03/2017/</td> 
                                <td>Livena nadogradnja</td> 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'app/views/_global/afterContent.php'; ?>