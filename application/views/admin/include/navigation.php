<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <img style="width:80px;height:80px " alt="image" class="img-circle" src="<?= base_url();?>public/images/profileImages/admin.jpg"/>
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">Admin Admin</strong>
                                </span>
                            </span>
                        </a>
                    </div>
                    <div class="logo-element">
                        RF
                    </div>
                </li>

                <li class="<?php if(isset($dashborad)){print_r($dashborad);} ?>">
                    <a href="<?= base_url().'dashboard';?>">
                        <i class="fa fa-th-large"></i> 
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                
                <li class="<?php if(isset($busroute)){print_r($busroute);} ?>">
                    <a href="<?= base_url().'bus-route';?>">
                        <i class="fa fa-bus"></i> 
                        <span class="nav-label">Bus Route</span>
                    </a>
                </li>
                
                <li class="<?php if(isset($station)){print_r($station);} ?>">
                    <a href="<?= base_url().'station';?>">
                         <i class="fa fa-stop-circle-o"></i> 
                        <span class="nav-label">Station</span>
                    </a>
                </li>
                
               
                <li class="<?php if(isset($booking)){print_r($booking);} ?>">
                    <a href="<?= base_url().'booking';?>">
                       <i class="fa fa-th"></i> 
                        <span class="nav-label">Booking List</span>
                    </a>
                </li>
            
            </ul>

        </div>
    </nav>