<!DOCTYPE html>
<html lang="en">
    
    <?php $this->load->view('agent/include/header');?>
    <body>
  <!-- Wrapper-->
    <div id="wrapper">
        <!-- Navigation -->
        <?php $this->load->view('agent/include/navigation');?>
              <!-- Page wraper -->
            <div id="page-wrapper" class="gray-bg">

                <!-- Page wrapper -->
                <?php $this->load->view('agent/include/bodyheader');?>
                    <?php $this->load->view('agent/include/breadcrumb');?>
                    <!-- Main view  -->
                    <?php $this->load->view($page);?>

                <?php $this->load->view('agent/include/bodyfooter');?> 
            </div>
    <!-- End page wrapper-->
    </div>    
        <?php $this->load->view('agent/include/footer');?> 
       </body>
</html>
