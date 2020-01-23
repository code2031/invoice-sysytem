<div class="page-content-wrapper ">
<div class="row">
<div class="col-12">
    <div class="card m-b-20">
        <div class="card-block">

            <h4 class="mt-0 header-title"> Our Valued Clients</h4>
            

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Names</th>
                    <th>Company</th>
                    <th>Office Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead> 
                <tbody> 
                 <?php foreach ($client_detail as $value) { ?>
                <tr>
                    <td><?php echo $value->names; ?></td>
                    <td><?php echo $value->company_name; ?></td>
                    <td><?php echo $value->address; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php echo $value->phone; ?></td>
                    <td>
                    <?php $query = $this->db->query("SELECT * FROM invoice inner join clients on invoice.client_id = clients.client_id WHERE clients.client_id = $value->client_id "); ?>
                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" 
                href="<?php echo site_url('admin_controller/display_single_client_invoice/'.$value->client_id);?>" data-original-title="Generated invoice : <?php echo $query->num_rows() ; ?> ">
                <i class="mdi mdi-receipt alert-success"></i></a> 
                |
                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" 
                href="<?php echo site_url('admin_controller/display_single_client/'.$value->client_id); ?>" data-original-title="Edit"><i class="fa fa-edit alert-info"></i></a> 
                |
                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" 
                href="<?php echo site_url('admin_controller/delete_client/'.$value->client_id) ; ?>" data-original-title="Delete" id="alertify-confirm"><i class="fa fa-trash alert-danger"></i></a>
           
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

