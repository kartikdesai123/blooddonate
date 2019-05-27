<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img style="width:80px;height:80px " alt="image" class="img-circle" src="<?= base_url();?>public/images/profileImages/admin.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs">  <strong class="font-bold"><?= $this->session->userdata['roroferry_admin']['firstName'] ?>  <?= $this->session->userdata['roroferry_admin']['lastName'] ?></strong>
                             </span> <span class="text-muted text-xs block"><?= $this->session->userdata['roroferry_admin']['userType'] ?><b class="caret"></b></span></span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= base_url().'logout';?>">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        LF
                    </div>
                </li>
                <li class="<?php if(isset($dashborad)){print_r($dashborad);} ?>">
                    <a href="<?= base_url().'employee';?>">
                        <i class="fa fa-th-large"></i> 
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                
                
            </ul>

        </div>
    </nav>