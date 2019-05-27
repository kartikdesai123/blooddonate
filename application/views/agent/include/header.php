<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/admin/css/vendor.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/admin/css/app.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/admin/css/plugins/toastr/toastr.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/admin/css/plugins/daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/admin/css/plugins/datapicker/datepicker3.css" />
    <link href="<?php echo base_url(); ?>public/asset/admin/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<?php
     if (!empty($css)){  
        foreach ($css as $value){ ?>  
        <link rel="stylesheet" href="<?= base_url(); ?>public/admin/css/<?php echo $value ?>">
      <?php  }
       }
    ?>
    <script>
        var baseurl = "<?= base_url()?>";
    </script>
</head>