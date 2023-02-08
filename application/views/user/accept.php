<?php if(isset($accept)) { ?>
    <?php if($accept) { ?>
        <h6>Proposition acceptée</h6>
    <?php }
    ?>
    <?php if(!$accept) { ?>
        <h6>Proposition refusée</h6>
    <?php }
    ?>
<?php }
?>