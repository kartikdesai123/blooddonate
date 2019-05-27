<!DOCTYPE html>
<html>
    <?php $this->load->view('front/layout/header'); ?>
    <body class="home_body">
        <!-- Main view  -->
        <?php $this->load->view($page); ?>
        <!-- Footer -->
        <?php 
        $this->load->view('front/layout/bodyfooter');?>
        <!-- End wrapper-->
        <?php $this->load->view('front/layout/footer'); ?>
    </body>
</html>
