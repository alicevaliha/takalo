<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Echanges proposés</h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Objet proposé</th>
                                <th>Prix</th>
                                <th>A échanger avec</th>
                                <th></th>
                                <th>Objet demandé</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($proposition)) { ?>
                            <?php foreach ($proposition as $props ) { ?>
                            <tr>
                                <td class="cart_product_img">
                                    <a href="#"><img  src="<?php echo site_url() ?>assets/website/img/<?php echo $props['categorieo']?>/<?php echo $props['imgo']?>" alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5><?php echo $props['offert']?></h5>
                                </td>
                                <td class="price">
                                    <span>$<?php echo $props['prixoffert']?></span>
                                </td>
                                <td></td>
                                <td class="cart_product_img">
                                    <a href="#"><img  src="<?php echo site_url() ?>assets/website/img/<?php echo $props['categoried']?>/<?php echo $props['imgd']?>" alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5><?php echo $props['demande']?></h5>
                                </td>
                                <td class="price">
                                    <span>$<?php echo $props['prixdemande']?></span>
                                </td>
                                <td class="qty">
                                    <div class="cart-btn mt-100">
                                        <form action="<?php echo base_url('user/proposer')?>" method="post">
                                            <input type="hidden" name="idprop" id="idprop" value="<?php echo $props['id_proposition']?>">
                                            <button type="submit"  class="btn amado-btn w-100" style="max-width: fit-content;border-radius: 10px;margin-top: -50%;">Accepter l'échange</button>
                                        </form>
                                    </div>
                                    <div class="cart-btn mt-100">
                                        <form action="<?php echo base_url('user/proposer')?>" method="post">
                                            <input type="hidden" name="idprop" id="idprop" value="<?php echo $props['id_proposition']?>">
                                            <button type="submit"  class="btn amado-btn w-100" style="max-width: fit-content;border-radius: 10px;margin-top: -50%;">Refuser l'échange</button>
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
        </div>
    </div>
</div>