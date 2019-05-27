 <script src="<?php echo base_url(); ?>public/asset/admin/js/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/asset/admin/js/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/asset/admin/js/plugins/toastr/toastr.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>public/asset/admin/js/comman_function.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/asset/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>public/asset/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>public/asset/admin/js/inspinia.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/asset/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>public/asset/admin/js/plugins/dataTables/datatables.min.js"></script>
            <?php
                if (!empty($js)){ 
                 foreach ($js as $value){ ?>
                <script src="<?= base_url()?>public/asset/admin/js/<?php echo $value; ?>" type="text/javascript"></script>

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
