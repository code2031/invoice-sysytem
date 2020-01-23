<div class="page-content-wrapper ">

<div class="container">

<div class="row">
<div class="col-12">
<div class="card m-b-20">
<div class="card-block">

<div class="row">
<div class="col-12">
<div class="invoice-title">
<h4 class="pull-right font-16">
<strong> Order Number : #<?php echo $single_invoice_detail[0]->order_number ; ?></strong></h4>
<h3 class="m-t-0">
    <img src="<?php echo base_url();?>assets/images/ot.png" alt="OT and T" height="42">
</h3>
</div>
<hr>
<div class="row">
<div class="col-6">
    <address>
        <strong>Billed To:</strong><br>
        <?php echo $single_invoice_detail[0]->company_name ; ?>
    </address>
</div>
<div class="col-6 text-right">
    <address>
        <strong>Address:</strong><br> 
        <?php echo $single_invoice_detail[0]->address ; ?>
    </address>
</div>
</div>
<div class="row">
<div class="col-6 m-t-30">
    <address>
        <strong>Project Name:</strong><br>
        <?php echo $single_invoice_detail[0]-> project_name ; ?><br> 
    </address>
</div>
<div class="col-6 m-t-30 text-right">
    <address>
        <strong>Order Date:</strong><br>
        <?php echo $single_invoice_detail[0]->date ; ?><br><br>
    </address>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-12">
<div class="panel panel-default">
<div class="p-2">
    <h3 class="panel-title font-20"><strong>Project Summary</strong></h3>
</div>
<div class="">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <td><strong>Project Description</strong></td>
                <td class="text-center"><strong>Amount</strong></td>  
            </tr>
            </thead>
            <tbody>
            <?php 
            $invoice_id = $single_invoice_detail[0]->invoice_id ;
            $query = $this->db->query("SELECT * FROM descriptions WHERE invoice_id = '$invoice_id'") ; 

            foreach ($query->result() as $value) { ?> 
            <tr>
                <td><?php echo $value->project_description ; ?></td>
                <td class="text-center"><?php echo $value-> amount; ?></td>  
            </tr>
            <?php  }?> 
            <tr> 
                <td class="no-line text-center"><strong>Total</strong></td>
                <td class="no-line text-right">
                <h4 class="m-0"><i class="mdi mdi-currency-ngn"></i>
                <?php echo $single_invoice_detail[0]->price_charged ; ?>
                </h4></td>
            </tr>
            <tr> 
                <td class="no-line text-center"><strong>Amount Paid</strong></td>
                <td class="no-line text-right">
                <h4 class="m-0"><i class="mdi mdi-currency-ngn"></i>
                <?php echo $single_invoice_detail[0]->amount_paid ; ?>
                </h4></td>
            </tr>
            <tr> 
                <td class="no-line text-center"><strong>Balance Due</strong></td>
                <td class="no-line text-right">
                <h4 class="m-0"><i class="mdi mdi-currency-ngn"></i>
                <?php echo $single_invoice_detail[0]->balance_due ; ?>
                </h4></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="hidden-print">
        <div class="pull-right">
            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
            <a href="<?php echo site_url('admin_controller/display_all_invoices') ?>" class="btn btn-dark waves-effect waves-light">Close</a>
        </div>
    </div>
</div>
</div>

</div>
</div> <!-- end row -->

</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->

</div><!-- container -->


</div>