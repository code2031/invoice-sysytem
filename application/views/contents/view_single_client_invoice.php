<div class="page-content-wrapper ">
<div class="row">
<div class="col-12">
    <div class="card m-b-20">
        <div class="card-block">

            <h4 class="mt-0 header-title">Invoice</h4>
            

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Order</th>
                    <th>Company Name</th>
                    <th>Project Name</th>
                    <th>Amount Charged</th>
                    <th>Amount Paid</th>
                    <th>Balance Due</th>
                    <th>Actions</th>
                </tr>
                </thead> 
                <tbody> 
                 <?php foreach ($single_client_invoice_detail as $value) { ?>
                <tr>
                    <td><?php echo $value->order_number; ?></td>
                    <td><?php echo $value->company_name; ?></td>
                    <td><?php echo $value->project_name; ?></td>
                    <td><i class="mdi mdi-currency-ngn"></i><?php echo $value->price_charged; ?></td>
                    <td><i class="mdi mdi-currency-ngn"></i><?php echo $value->amount_paid; ?></td>
                    <td><i class="mdi mdi-currency-ngn"></i><?php echo $value->balance_due; ?></td>
                    <td>
                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" 
                href="<?php echo site_url('admin_controller/display_single_invoice/'.$value->invoice_id) ;?>" data-original-title="View Invoice"><i class="mdi mdi-receipt alert-success"></i></a> 
                |
                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" 
                href="<?php //echo site_url('admin_controller/display_single_client/'.$value->client_id); ?>" data-original-title="Edit"><i class="fa fa-edit alert-info"></i></a> 
                |
                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" 
                href="<?php //echo site_url('admin_controller/delete_client/'.$value->client_id) ; ?>" data-original-title="Delete" id="alertify-confirm"><i class="fa fa-trash alert-danger"></i></a>
           
                    </td>
                </tr>
               <?php } ?>   
                </tbody>
            </table>

        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->
</div><!-- container -->


</div> <!-- Page content Wrapper -->

</div> <!-- content -->

