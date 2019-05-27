<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Flight - Travel and Tour</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        var baseurl = "<?= base_url() ?>index.php/";
    </script>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="<?= base_url() ?>public/asset/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/asset/front/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/asset/front/css/fontAwesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/asset/front/css/hero-slider.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/asset/front/css/owl-carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/asset/front/css/datepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/asset/front/css/tooplate-style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <script src="<?= base_url() ?>public/asset/front/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <?php
     if (!empty($css)){  
        foreach ($css as $value){ ?>  
        <link rel="stylesheet" href="<?= base_url() ?>public/asset/front/css/<?php echo $value ?>">
      <?php  }
       }
    ?>
</head>

