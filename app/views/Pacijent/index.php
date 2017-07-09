<?php require_once './app/views/_global/beforeContent.php'; ?>


<h1 id="naslov" class="mr-auto">Svi pacijenti</h1>

<form class="form-inline">

    <input class="form-control" type="text" placeholder="Pretraži pacijenta">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pretraga</button>

</form>
<a href="<?php echo Configuration::BASE_URL; ?>pacijent/dodaj" class="btn btn-lg btn-outline-success btn-block mb-5"> Dodaj pacijenta &#10010;</a>

<div class="row col-12">

<?php


if (is_array($DATA['pacijentitogzubara']))
    foreach ($DATA['pacijentitogzubara'] as $pacijent):
        //col-12 col-sm-12 col-md-6 col-lg-12   
        ?>
        
        <article class="col-12 col-sm-12 col-md-6 col-lg-4">

            <div class="thumbnail" style="border: solid 5px; border-color: #248FBD;">
                <img  class="img img-thumbnail" alt="profilSlika"  src="<?php echo Configuration::BASE_URL; ?>assets/img/profil/<?php echo $pacijent->pacijent_id ?>.jpg"> 
                <div class="caption">
                    <h3 class="ime"><?php
                        echo $pacijent->ime;
                        echo ' ';
                        echo $pacijent->prezime
                        ?></h3>
                    <section class="row"><h5 style="margin-right: 5px;">Datum rodjenja:</h5><?php echo htmlspecialchars($pacijent->datum_rodjenja);?></section>
                    <section class="row"><h5 style="margin-right: 5px;">E-mail: </h5><?php echo htmlspecialchars($pacijent->email);?></section>
                    <section class="row"><h5 style="margin-right: 5px;">Broj telefona: </h5><?php echo htmlspecialchars($pacijent->telefon);?></section>
                    <section class="row"><h5 style="margin-right: 5px;">JMBG: </h5><?php echo htmlspecialchars($pacijent->jmbg);?></section>
                    <section class="row"><h5 style="margin-right: 5px;">Alergije: </h5><?php echo htmlspecialchars($pacijent->alergije);?></section>
                    <section class="row"><h5 style="margin-right: 5px;">Kategorija pacijenta: </h5><?php echo htmlspecialchars($pacijent->kategorija_pacijenta);?></section>
                    <div class="text-center mt-4">
                        
                        <a href="<?php echo Configuration::BASE_URL; ?>pregled/<?php echo $pacijent->pacijent_id ?>" class="btn btn-success  mr-3" role="button">Pregled</a> 
                        <a href="<?php echo Configuration::BASE_URL; ?>pacijent/izmeni/<?php echo $pacijent->pacijent_id ?>" class="btn btn-warning  mr-3" role="button">Izmeni</a>
                        <a href="<?php echo Configuration::BASE_URL; ?>pacijent/ukloni/<?php echo $pacijent->pacijent_id ?>" class="btn btn-danger" role="button">&#10006;</a>
                    </div>
                </div>
            </div>

        </article>
        
    <?php endforeach; ?>

</div>


<?php require_once 'app/views/_global/afterContent.php'; ?>

