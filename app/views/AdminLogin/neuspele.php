<?php require_once './app/views/_global/adminBeforeContent.php'; ?>
<h1 id="naslov" class="mr-auto mb-4 text-center" >Sve neuspesne prijave na sistem</h1>

<table class="table table-bordered table-striped table-responsive col-12 col-md-9 col-lg-12">
    <thead>
        <tr>
            <th class="text-center">Vreme</th>
            <th class="text-center">Username</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $temp = $DATA['prijave'];
        if (is_array($temp))
            foreach ($temp as $prijava):
                ?>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($prijava->datetime); ?><br></th>
                    <td class="text-center"><?php echo htmlspecialchars($prijava->username); ?></td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>

<?php require_once './app/views/_global/adminAfterContent.php'; ?>

