  <script src="<?= base_url()?>public/asset/front/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/jquery-ui.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/popper.min.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/owl.carousel.min.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/jquery.sticky.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/jquery.waypoints.min.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/jquery.animateNumber.min.js"></script>
  <script src="<?= base_url()?>public/asset/front/js/aos.js"></script>

  <script src="<?= base_url()?>public/asset/front/js/main.js"></script>
            <?php
                if (!empty($js)){ 
                 foreach ($js as $value){ ?>
                <script src="<?= base_url()?>public/asset/front/js/<?php echo $value; ?>" type="text/javascript"></script>

                <?php } }
            ?>

<script>
    jQuery(document).ready(function() {
        <?php
        if (!empty($init)) {
            foreach ($init as $value) {
                echo $value . ';';
            }
        }
        ?>
    });
</script>
