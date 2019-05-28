<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <?php if($this->session->userdata['blooddonate_admin']['image'] == '' || $this->session->userdata['blooddonate_admin']['image'] == NULL){
                                print_r('<img style="width:80px;height:80px " alt="image" class="img-circle" src="'.base_url().'public/images/profileImages/admin.png"/>');
                            }else{
                                print_r('<img style="width:80px;height:80px " alt="image" class="img-circle" src="'.base_url().'public/images/profileImages/'.$this->session->userdata['blooddonate_admin']['image'].'"/>');
                            }?>
                           
                            
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold"><?= $this->session->userdata['blooddonate_admin']['firstName'] ?>  <?= $this->session->userdata['blooddonate_admin']['lastName'] ?></strong>
                                </span>
                            </span>
                        </a>
                    </div>
                    <div class="logo-element">
                        BD
                    </div>
                </li>

                <li class="<?php if(isset($dashborad)){print_r($dashborad);} ?>">
                    <a href="<?= base_url().'dashboard';?>">
                        <i class="fa fa-th-large"></i> 
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                
                <li class="<?php if(isset($children)){print_r($children);} ?>">
                    <a href="<?= base_url().'children';?>">
                        <i class="fa fa-users"></i> 
                        <span class="nav-label">Children</span>
                    </a>
                </li>
                
            
            </ul>

        </div>
    </nav>