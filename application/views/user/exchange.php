<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Choisir l'objet à échanger</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($objectlist)) { ?>
                                    <?php foreach ($objectlist as $objet ) { ?>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img  src="<?php echo site_url() ?>assets/website/img/<?php echo $objet['nom_categorie']?>/<?php echo $objet['img']?>" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $objet['nom_objet']?></h5>
                                        </td>
                                        <td class="price">
                                            <span>$<?php echo $objet['prix']?></span>
                                        </td>
                                        <td class="qty">
                                            <div class="cart-btn mt-100">
                                                <form action="<?php echo base_url('user/proposer')?>" method="post">
                                                    <input type="hidden" name="iprop" id="iprop" value="<?php echo $idproprio ?>">
                                                    <input type="hidden" name="objd" id="objd" value="<?php echo $objdetails['id_objet'] ?>">
                                                    <input type="hidden" name="objoff" value="<?php echo $objet['id_objet'] ?>">
                                                    <button type="submit"  class="btn amado-btn w-100" style="max-width: fit-content;border-radius: 10px;margin-top: -50%;">Valider l'échange</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }
                                    ?>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                    <?php if(isset($objdetails)) { ?>
                        <div class="cart-summary">
                            <h5>Objet convoité</h5>
                            <ul class="summary-table">
                                <li class="cart_product_img"><img  src="<?php echo site_url() ?>assets/website/img/<?php echo $objdetails['nom_categorie']?>/<?php echo $objdetails['img']?>" alt="Product"></li>
                                <li><span>Prix</span> <span>$<?php echo $objdetails['prix'] ?></span></li>
                                <li><span>Nom</span> <span><?php echo $objdetails['nom_objet'] ?></span></li>
                                <li><span>Utilisateur</span> <span><?php echo $objdetails['nom'] ?></span></li>
                            </ul>
                        </div>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
        </div>