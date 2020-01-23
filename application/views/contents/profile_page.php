
<div class="page-content-wrapper ">

<div class="container">

<div class="row">
<div class="col-lg-6">
<div class="card m-b-20">
<div class="card-block">

<h4 class="mt-0 header-title">Details</h4> 
<?php  echo form_open_multipart('admin_controller/update_profile') ?> 
<div class="form-group">
  <label>Names</label>
    <?php echo form_error('names') ;?>
  <input type="text" name="names" class="form-control" value="<?php  echo $profile[0]-> names ;?>" />
</div>

<div class="form-group">
  <label>Designation</label>
    <?php echo form_error('designation') ;?>
  <input type="text" name="designation" class="form-control" value="<?php  echo $profile[0]-> designation ;?>" />
</div>

<div class="form-group">
  <label>E-Mail</label>
    <?php echo form_error('email') ;?>
  <div>
    <input type="text" name="email" class="form-control" value ="<?php  echo $profile[0]-> email ;?>"/>
  </div>
</div>

<div class="form-group">
  <label>Username</label>
    <?php echo form_error('uname') ;?>
  <div>
<input  type="text" name="uname" class="form-control" value="<?php echo $profile[0]-> username ;?>"/>
  </div>
</div>

<div class="form-group">
  <label>Phone Number</label>
    <?php echo form_error('phone') ;?>
  <div>
      <input type="text" name="phone" class="form-control" value="<?php echo $profile[0]-> phone ;?>"/>
  </div>
</div>

<div class="form-group">
  <label>Date Registered</label> 
  <div>
  <input type="text" disabled="" name="reg_date" class="form-control" value="<?php echo $profile[0]-> reg_date ;?>"/>
  </div>
</div> 
 
<div class="form-group">
  <div>
      <button type="submit" class="btn btn-primary waves-effect waves-light"> Update </button>
      <a href="<?php echo site_url('admin_controller/display_all_admins') ?>" class="btn btn-dark">Close</a>
  </div>
</div> 

</div>
</div>
</div> <!-- end col -->

<div class="col-lg-6">
<div class="card m-b-20">
<div class="card-block">

<h4 class="mt-0 header-title">Profile Picture</h4> 
 <div id="sidebar" class="col-lg-4">
      <?php $pics = $profile[0]-> pix ; ?>
<img width="200" height="200" src="<?php echo base_url()?>/<?php echo ($pics)? $pics : "assets/uploads/user.png" ;?>" >
         <input type="file" name ="pix" >
      </div>  


</form>

</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->

</div><!-- container -->


</div> <!-- Page content Wrapper -->

</div> <!-- content -->
