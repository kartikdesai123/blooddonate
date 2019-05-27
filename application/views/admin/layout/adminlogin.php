<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/admin/css/vendor.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/admin/css/app.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/admin/css/plugins/toastr/toastr.min.css" />

<?php
     if (!empty($css)){  
        foreach ($css as $value){ ?>  
        <link rel="stylesheet" href="<?= base_url(); ?>public/admin/css/<?php echo $value ?>">
      <?php  }
       }
    ?>
</head>
<body class="gray-bg" background="<?= base_url(); ?>public/asset/admin/images/bg.jpg">
    <?php $this->load->view($page);?>
     <script src="<?php echo base_url(); ?>public/asset/admin/js/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/asset/admin/js/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/asset/admin/js/plugins/toastr/toastr.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>public/asset/admin/js/comman_function.js" type="text/javascript"></script>
            <?php
if (!empty($js)){ 
 foreach ($js as $value){ ?>
<script src="<?= base_url()?>public/asset/admin/js/<?php echo $value; ?>" type="text/javascript"></script>
<style>
    .has-error .form-control, .has-error .form-control:focus {
        border-color: red;
        border-width: 2px;
    }
</style>
<?php } } ?>
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
</body>

</html>
