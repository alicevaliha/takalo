<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
<h4>PRODUITS UTILISATEURS</h4>
    <div class="amado-pro-catagory clearfix">

        <!-- Single Catagory -->
        <?php if(isset($listres)) { ?>
            <?php foreach ($listres as $objet ) { ?>
                <div class="single-products-catagory clearfix">
                    <a href="<?php echo base_url('user/productdetail')?>/<?php echo $objet['id_objet']?>">
                        <img src="<?php echo site_url() ?>assets/website/img/<?php echo $objet['nom_categorie']?>/<?php echo $objet['img']?>" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p><?php echo $objet['prix']?></p>
                            <h4><?php echo $objet['nom_objet']?></h4>
                            <h6>Vendu par</h6>
                            <p><?php echo $objet['nom']?></p>
                        </div>
                    </a>
                </div>
            <?php }
                ?>
        <?php }
        ?>

    </div>
</div>
<!-- Product Catagories Area End -->
