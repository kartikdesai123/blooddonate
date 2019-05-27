<head>
    <title>Foundation &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700|Anton" rel="stylesheet">
    

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/style.css">
    
<?php
     if (!empty($css)){  
        foreach ($css as $value){ ?>  
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/asset/front/css/<?php echo $value ?>">
      <?php  }
       }
    ?>
    <script>
        var baseurl = "<?= base_url()?>";
    </script>
</head>