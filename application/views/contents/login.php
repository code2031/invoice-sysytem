   

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-block">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="<?php echo site_url('home') ?>" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/ot.png" height="54" alt="OT $ T"></a>
                    </h3>

                    <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

                         <?php if (isset($feedback)) {  ?>
                         <div class="alert alert-danger" align="center">
                             <?php echo $feedback ; ?> 
                           </div>
                         <?php } ?>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="<?php echo site_url('home/validate_login_details') ;?>" method="post">
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" name="uname_fone" value="<?php echo set_value('uname_fone'); ?>"  required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" name="pwd1" value="<?php echo set_value('pwd1'); ?>" required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Remember me</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="<?php echo site_url('home/recoverpwd') ?>" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot your password?</a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="<?php echo site_url('home/register') ?>" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
 