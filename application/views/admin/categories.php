<?php if(isset($listecategorie)) { ?>
    <?php foreach ($listecategorie as $categorie ) { ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $categorie['nom_categorie']?></h5>
                <p class="card-text"><a href="#" class="btn btn-primary">Consulter les données de cette catégorie</a></p>
            </div>
        </div><!-- End Card with titles, buttons, and links -->
    <?php }
    ?>
<?php }
?>