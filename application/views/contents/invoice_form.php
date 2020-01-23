

<div class="page-content-wrapper ">

<div class="container">

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-block"> 

            <?php if (isset($success_message)) { ?>
             <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <?php echo $success_message ; ?> 
                </div>
            <?php } ?>
            
            <?php if ( validation_errors()) { ?>
             <div class="alert alert-danger alert-dismissible" align="center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <?php echo  validation_errors() ; ?> 
                </div>
            <?php } ?>

     <form class="form-horizontal m-t-20" action="<?php echo site_url('admin_controller/create_invoice') ;?>" method="post">
                <div class="form-group row col-lg-20" align="center">  
                    <div class="col-sm-4">  
                <select type="text" id="number" name="client_id" required="required" class="custom-select">
                     <option>--Select Client-- </option>
                      <?php  foreach ( $client_detail as $value ) { ?>   
                      <option value="<?php echo $value-> client_id ;?>">
                        <?php echo $value-> company_name ; ?>
                      </option>
                      <?php } ?>
                    </select>
                    </div>  &nbsp;
                  <div class="form-group row"> 
                    <div class="col-sm-10">   
                <input class="form-control" type="text" name="project_name" placeholder="Project Name"
                         value="<?php echo set_value('project_name') ?>" id="example-text-input">
                    </div>
                </div>
                <div class="form-group col-lg-5"> 
                <div class="input-daterange input-group" id="date-range">
                    <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i>
                    </span><input type="text" name="start" value="<?php echo set_value('start') ?>" class="form-control datepicker" placeholder="Start by :">
                    
                    <span class="input-group-addon b-0">Time Line</span>
                    <input type="text" name="end" value="<?php echo set_value('end'); ?>" 
                    class="form-control datepicker" placeholder="End by :">
                    <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i>
                    </span>
                </div>
                </div>

                </div> 
                <div class="row">
                  <div class="col-sm-2 pull-left"><a href="#" id="add-prod-btn" class="btn btn-primary"><span class="fa fa-plus"></span> Add Description </a></div>
                </div>
                <br>
                <div id="products-form-section">
                  
                </div>
                <hr style="margin-top: 20px">
                <div class="row">
                  <div class="col-sm-6 form-group">
                     <label>Total</label>
                  <input type="text" name="total" readonly="readonly" id="total" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 form-group"> 
                     <label>Amount Paid</label>
                    <input type="number" min="0" name="amount_paid" value="<?php echo set_value('amount_paid'); ?>"  class="form-control">
                  </div>
                </div>

      <div class="form-group">
                <div class="col-12">
           <button class="btn btn-primary text-center waves-effect waves-light" type="submit">Submit</button>
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



                 <!--  <div class="form-group row"> 
                    <div class="col-sm-10">  
                <?php // echo form_error('price_charged') ;?>
                <input class="form-control" type="text" name="price_charged" placeholder="Price Charged"
                         value="<?php // echo set_value('price_charged') ?>" id="example-text-input">
                    </div>
                </div> --> 
                 <!--  <div class="form-group row"> 
                    <div class="col-sm-10">  
                <?php // echo form_error('amount_paid') ;?>
                <input class="form-control" type="text" name="amount_paid" placeholder="Amount Paid"
                         value="<?php // echo set_value('amount_paid') ?>" id="example-text-input">
                    </div>
                </div> -->




                <!-- <div class="row">
                  <div class="form-group col-sm-6">
                    <label>Product Description</label>
                    <input type="text" class="form-control" name="products[1][description]">
                  </div>
                  <div class="form-group col-sm-5">
                    <label>Product Amount</label>
                    <input type="number" min="0" class="form-control" name="products[1][amount]">
                  </div>
                  <div class="form-group col-sm-1" style="margin-top: 27px">
                    <a href="#" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                  </div>
                   -->