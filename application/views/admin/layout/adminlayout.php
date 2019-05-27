<!DOCTYPE html>
<html lang="en">
    
    <?php $this->load->view('admin/include/header');?>
    
  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        <?php $this->load->view('admin/include/navigation');?>
              <!-- Page wraper -->
            <div id="page-wrapper" class="gray-bg">

                <!-- Page wrapper -->
                <?php $this->load->view('admin/include/bodyheader');?>
                    <?php $this->load->view('admin/include/breadcrumb');?>
                    <!-- Main view  -->
                    <?php $this->load->view($page);?>

                <?php $this->load->view('admin/include/bodyfooter');?> 
            </div>
             
    <!-- End page wrapper-->
    </div>    
        <?php $this->load->view('admin/include/footer');?> 
       </body>
</html>
