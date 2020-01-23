
        
        <!-- Begin page -->
        <div id="wrapper">

              <?php
                $user_id = $this->session->userdata('user_id') ;
                $get = $this->db->query("SELECT * FROM users WHERE user_id = '$user_id'") ;

                 if ($get->num_rows() == 1) 
                  {
                    foreach ($get->result() as $value)
                           { 
                            $pics =  $value ->pix ;
                           }
                  }  
                ?>
            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0"> 
                                <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="" role="button" aria-haspopup="false" aria-expanded="false">
                                 <img src="<?php echo base_url()?>/<?php echo ($pics)? $pics : "assets/uploads/user.png" ;?>" alt="" class="rounded-circle"> </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <a class="dropdown-item" href="<?php echo site_url('admin_controller/profile_page') ?>">
                                    <i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a> 
                                    <a class="dropdown-item" href="index.html#">
                                    <i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i>Lock screen</a>
                                    <a class="dropdown-item" href="<?php echo site_url('home/logout') ?>">
                                    <i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title"><?php echo  $page_title ; ?></h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->