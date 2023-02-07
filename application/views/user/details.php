 <!-- Product Details Area Start -->
 <div class="single-product-area section-padding-100 clearfix">
    <?php if(isset($objdetails)) { ?>
        <div class="container-fluid">
            <ol class="breadcrumb mt-50">
                <li class="breadcrumb-item"><a href="#"><?php echo $objdetails['nom']?></a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $objdetails['nom_categorie']?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $objdetails['nom_objet']?></li>
            </ol>
            <div class="row">
                <div class="col-12 col-lg-7"> 
                <img style="max-width:62%" class="d-block w-100" src="<?php echo site_url() ?>assets/website/img/<?php echo $objdetails['nom_categorie']?>/<?php echo $objdetails['img']?>" alt="">
            </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price"><?php echo $objdetails['prix']?>$</p>
                            <a href="#">
                                <h6><?php echo $objdetails['nom']?></h6>
                            </a>
                        </div>

                        <div class="short_overview my-5">
                            <p><?php echo $objdetails['descri']?></p>
                        </div>
                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" method="post" action="<?php echo base_url('user/gotoexchange')?>">
                            <input type="hidden" name="idobj" id="idobj" value="<?php echo $objdetails['id_objet']?>">
                            <input type="hidden" name="id" id="id" value="<?php echo $objdetails['id_utilisateur']?>">
                            <button type="submit" name="addtocart" value="5" class="btn amado-btn">Proposer un échange</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
</div>
<!-- Product Details Area End -->