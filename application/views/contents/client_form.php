

<div class="page-content-wrapper ">

<div class="container">

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-block"> 

            <?php if (isset($success_message)) { ?>
             <div class="alert alert-info alert-dismissible" align="center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <?php echo $success_message ; ?> 
                </div>
            <?php } ?>

            <form class="form-horizontal m-t-20" action="<?php echo site_url('admin_controller/create_client') ;?>" method="post">
                <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Names</label>
                    <div class="col-sm-10"> 
                <?php echo form_error('names') ;?>
                        <input class="form-control" type="text" name="names"
                         value="<?php echo set_value('names') ?>" id="example-text-input">
                    </div>
                </div>
                  <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10"> 
                <?php echo form_error('company_name') ;?>
                        <input class="form-control" type="text" name="company_name"
                         value="<?php echo set_value('company_name') ?>" id="example-text-input">
                    </div>
                </div>
                  <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10"> 
                <?php echo form_error('address') ;?>
                        <input class="form-control" type="text" name="address"
                         value="<?php echo set_value('address') ?>" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                <?php echo form_error('email') ;?>
                        <input class="form-control" type="email" name="email" 
                        value="<?php echo set_value('email') ?>" id="example-email-input">
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-10">
                <?php echo form_error('phone') ;?>
                        <input class="form-control" type="tel" name="phone"  
                        value="<?php echo set_value('phone') ?>" id="example-tel-input">
                    </div>
                </div>
                <div class="form-group text-center row m-t-20">
                <div class="col-12">
            <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                </div>
                </div> 

            </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

</div><!-- container -->


</div> <!-- Page content Wrapper -->

</div> <!-- content -->
