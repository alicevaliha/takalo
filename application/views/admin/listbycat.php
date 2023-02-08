<ul>
    <?php if(isset($listbycat)) { ?> 
        <?php foreach ($listbycat as $objet ) { ?>
            <li style="max-width:10%">
                <div class="card">
                    <img src="<?php echo site_url() ?>assets/website/img/<?php echo $objet['nom_categorie']?>/<?php echo $objet['img']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $objet['nom_objet']?></h5>
                        <p class="card-text"><?php echo $objet['descri']?></p>
                    </div>
                </div>
            </li>
        <?php }
        ?>
    <?php }
    ?>
</ul>