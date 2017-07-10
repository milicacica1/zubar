<?php require_once './app/views/_global/beforeContent.php'; ?>
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
            foreach ($DATA['intervencije'] as $intervencija) :
                ?>
                <tr> 
                    <th scope="row"><?php echo $i++ ?></th> 
                    <td> <?php echo $intervencija->zub ?></td> 
                    <td> <?php echo $intervencija->naziv ?></td> 
                    <td> <?php echo $intervencija->cena ?>€</td> 
                </tr>
            <?php endforeach;
            ?>
            <tr> 
                <th colspan="3" class="desno">Ukupno:</th> 
                <td><?php echo $DATA['ukupno'] ?>€</td>
            </tr>
        </tbody> 
    </table>
    <div class="desno">
<!--        <button onClick="window.print()">Print this page</button>   -->
        
        <form method="post" action="<?php echo Configuration::BASE_URL; ?>pregled/ukloni/<?php echo $DATA['pacijent']->pacijent_id ?>">
            <input type="hidden" name="confirmed" value="1">
            <button type="submit" class="btn btn-primary razmak">Poništi</button>
            <a href = "<?php echo Configuration::BASE_URL; ?>racun" class="btn btn-warning">Štampa računa</a>
        </form>
       
    </div>

<?php require_once './app/views/_global/afterContent.php'; ?>