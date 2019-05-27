<!DOCTYPE html>
<html lang="en">
    
    <?php $this->load->view('front/include/header');?>
        <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
            <div class="site-wrap"  id="home-section">
                <?php $this->load->view('front/include/bodyheader');?>
                    <?php $this->load->view($page);?>
                <?php $this->load->view('front/include/bodyfooter');?>
            </div>
             <?php $this->load->view('front/include/footer');?> 
        </body>
</html>