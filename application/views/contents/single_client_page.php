
<div class="page-content-wrapper ">

<div class="container">

<div class="row">
<div class="col-lg-6">
<div class="card m-b-20">
<div class="card-block">

<h4 class="mt-0 header-title">Details</h4> 
<?php // echo form_open_multipart('admin_controller/update_client') ?> 
<div class="form-group">
  <label>Names</label>
    <?php echo form_error('names') ;?>
  <input type="text" name="names" class="form-control" value="<?php  echo $single_client_detail[0]-> names ;?>" />
</div>

<div class="form-group">
  <label>Company Name</label>
    <?php echo form_error('company_name') ;?>
  <input type="text" name="company_name" class="form-control" value="<?php  echo $single_client_detail[0]-> company_name ;?>" />
</div>

<div class="form-group">
  <label>E-Mail</label>
    <?php echo form_error('email') ;?>
  <div>
    <input type="text" name="email" class="form-control" value ="<?php  echo $single_client_detail[0]-> email ;?>"/>
  </div>
</div>

<div class="form-group">
  <label>Address</label>
    <?php echo form_error('address') ;?>
  <div>
<input  type="text" name="address" class="form-control" value="<?php echo $single_client_detail[0]-> address ;?>"/>
  </div>
</div>

<div class="form-group">
  <label>Phone Number</label>
    <?php echo form_error('phone') ;?>
  <div>
      <input type="text" name="phone" class="form-control" value="<?php echo $single_client_detail[0]-> phone ;?>"/>
  </div>
</div>

<div class="form-group">
  <label>Date Registered</label> 
  <div>
  <input type="text" disabled="" name="reg_date" class="form-control" value="<?php echo $single_client_detail[0]-> date ;?>"/>
  </div>
</div> 
 
<div class="form-group">
  <div>
      <button type="submit" class="btn btn-primary waves-effect waves-light"> Update </button>
      <a href="<?php echo site_url('admin_controller/display_dashboard') ?>" class="btn btn-dark">Close</a>
  </div>
</div> 

</div>
</div>
</div> <!-- end col -->

<div class="col-lg-6">
<div class="card m-b-20">
<div class="card-block">

<h4 class="mt-0 header-title">Company Logo</h4> 
 <div id="sidebar" class="col-lg-4">
      <?php $logo = $single_client_detail[0]-> logo ; ?>
<img width="200" height="200" src="<?php echo base_url()?>/<?php echo ($logo)? $logo : "assets/uploads/user.png" ;?>" >
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
