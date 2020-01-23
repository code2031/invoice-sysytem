

<div class="page-content-wrapper ">

<div class="container">  

<div class="row">
<?php foreach ($user_detail as $value) { ?>
<div class="col-lg-4">
<div class="card m-b-20">
<div class="card-block">

<div class="media">
    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" 
    src="<?php echo base_url()?>/<?php echo ($value-> pix)? $value-> pix : "assets/uploads/user.png" ;?>" alt="Generic placeholder image">
    <div class="media-body">
        <a href=""><h5 class="mt-0 font-18 mb-1"><?php echo($value-> names)? $value-> names : "Anonymous"; ?></h5></a>
        <p class="text-muted font-14"><?php echo $value-> designation ; ?>
            <br> Status : <?php echo $value-> status ; ?> 
        </p> 
        <ul class="social-links list-inline mb-0">
            <?php  if ($value->user_id != $this->session->userdata('user_id')) {?>
            <li class="list-inline-item">
            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?php echo site_url('admin_controller/delete_admin/'.$value-> user_id) ?>" data-original-title="Delete"><i class="fa fa-trash alert-danger"></i></a>
            </li> 
             <?php  if ($value-> status == 'disabled') {?>
            <li class="list-inline-item">
            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?php echo site_url('admin_controller/enable_admin/'.$value-> user_id) ?>" data-original-title="Click to enable"><i class="fa fa-thumbs-o-down"></i></a>
            </li>
            <?php  } ;?> 
            <?php  if ($value-> status == 'enabled') {?>
            <li class="list-inline-item">
            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?php echo site_url('admin_controller/disable_admin/'.$value-> user_id) ?>" data-original-title="Click to disable"><i class="fa fa-thumbs-up alert-success"></i></a>
            </li>
            <?php } ?>
            <?php } ?>
            <li class="list-inline-item">
                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="<?php echo $value-> email ; ?>"><i  class="fa fa-envelope alert-warning"></i></a>
            </li>
            <li class="list-inline-item">
                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="<?php echo $value-> phone ; ?>"><i class="fa fa-phone alert-info"></i></a>
            </li>

            
        </ul>

    </div>
</div>

</div>
</div>
</div> <!-- end col --> 

<?php }?>
</div> <!-- end row -->



</div><!-- container -->


</div> <!-- Page content Wrapper -->

</div> <!-- content -->

