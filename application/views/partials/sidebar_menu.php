  <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo">Admiry</a>-->
                        <a href="<?php echo site_url('admin_controller/display_dashboard') ?>" class="logo"><img src="<?php echo base_url(); ?>assets/images/ot.png" height="50" alt="logo"></a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">
                    <?php
                        $user_id = $this->session->userdata('user_id') ;
                        $get = $this->db->query("SELECT * FROM users WHERE user_id = '$user_id'") ;

                         if ($get->num_rows() == 1) 
                          {
                            foreach ($get->result() as $value)
                               {
                                $names =  $value ->names ;
                                $pics =  $value ->pix ;
                               }
                          }  
                      ?>
                        <div class="user-details">
                        <div class="text-center">
                            <img src="<?php echo base_url()?>/<?php echo ($pics)? $pics : "assets/uploads/user.png" ;?>" alt="" class="rounded-circle"> 
                        </div>
                        <div class="user-info">
                            <h4 class="font-16"><?php echo $names ; ?></h4>
                            <span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Online</span>
                        </div>
                    </div>

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo site_url('admin_controller/display_dashboard') ?>" class="waves-effect"><i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard</span>
                                </a>
                            </li>


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                <i class="fa fa-user"></i> 
                            <span> User <span class="badge badge-primary pull-right">
                            <?php 
                            $query = $this->db->query('SELECT * FROM users'); 
                            echo $query->num_rows() ;
                            ?> 
                            </span> </span> </a>
                                <ul class="list-styled">
                                    <li><a href="<?php echo site_url('admin_controller/create_user');?>">New User</a></li>
                                    <li><a href="<?php echo site_url('admin_controller/display_all_admins') ?>">View Users</a></li>  
                                </ul>
                            </li>

                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                <i class="fa fa-group"></i> 
                            <span> Clients <span class="badge badge-primary pull-right">
                            <?php 
                            $query = $this->db->query('SELECT * FROM clients'); 
                            echo $query->num_rows() ;
                            ?> 
                            </span> </span> </a>
                                <ul class="list-styled">
                                <li><a href="<?php echo site_url('admin_controller/create_client');?>">Create Client</a></li>
                                <li><a href="<?php echo site_url('admin_controller/display_dashboard') ?>">View Clients</a></li>  
                                </ul>
                            </li> 

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-receipt"></i> <span> Invoice </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo site_url('admin_controller/create_invoice');?>" >Create Invoice</a></li>
                                    <li><a href="<?php echo site_url('admin_controller/display_all_invoices') ?>">View Invoices</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-currency-ngn"></i><span> Payment </span></a> 
                            </li>  

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->