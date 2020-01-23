
        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-block">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="<?php echo site_url('home') ?>"  class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/ot.png" height="54" alt="OT $ T"></a>
                    </h3>

                    <h4 class="text-muted text-center font-18"><b>Register</b></h4>
                    
                        <?php if (isset($success_message)) { ?>
                         <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                 <?php echo $success_message ; ?> 
                            </div>
                        <?php } ?>
                        
                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="<?php echo site_url('home/register') ;?>" method="post">

                            <div class="form-group row">
                            <?php echo form_error('email'); ?>
                                <div class="col-12">
                                    <input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                             <?php echo form_error('uname'); ?>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="uname" value="<?php echo set_value('uname'); ?>" required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                             <?php echo form_error('phone'); ?>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="phone" value="<?php echo set_value('phone'); ?>" required="" placeholder="Phone Number">
                                </div>
                            </div>

                            <div class="form-group row">
                             <?php echo form_error('pwd1'); ?>
                                <div class="col-12">
                                    <input class="form-control" type="password"  name="pwd1" value="<?php echo set_value('pwd1'); ?>"  required="" placeholder="Password">
                                </div>
                            </div> 

                            <div class="form-group row">
                             <?php echo form_error('pwd2'); ?>
                                <div class="col-12">
                                    <input class="form-control" type="password" name="pwd2" value="<?php echo set_value('pwd2'); ?>" required="" placeholder=" Confirm Password">
                                </div>
                            </div> 

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20 text-center">
                                    <a href="<?php echo site_url('home'); ?>" class="text-muted">Already have account?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

 