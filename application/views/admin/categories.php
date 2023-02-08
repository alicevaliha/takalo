<?php if(isset($listecategorie)) { ?>
    <?php foreach ($listecategorie as $categorie ) { ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $categorie['nom_categorie']?></h5>
                <form action="<?php echo base_url('admin/productbycat')?>" method="post">
                    <input type="hidden" name="categorie" id="categorie" value="<?php echo $categorie['id_categorie']?>">
                    <button type="submit" class="btn btn-primary">Consulter les données de cette catégorie</p>
                </form>
            </div>
        </div><!-- End Card with titles, buttons, and links -->
    <?php }
    ?>
<?php }
?>