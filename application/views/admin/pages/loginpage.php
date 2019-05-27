    <div class="middle-box text-center loginscreen animated fadeInDown" style="padding-top:180px ">
        <div>
            <div>
                <div class="logo d-none d-lg-block">
                    <a href="<?php echo base_url().'admin';?>">
                         <img style="width: 150px;height: 150px;" src="<?= base_url().'public/asset/admin/images/logo.png' ?>" alt="Logo" />
                     </a>
                </div>
            </div>
            <form class="m-t" role="form" id="login" action="<?php echo base_url().'admin' ;?>" method="post">

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn block full-width m-b" style="background-color: #0cb2c1;color: #ffffff">Login</button>
            </form>
        </div>
    </div>
<style>
    .has-error .form-control, .has-error .form-control:focus {
        border-color: red!important;
        border-width: 2px!important;
    }
    .has-error {
        border-color: red!important;
        border-width: 2px!important;
    }
</style> 
