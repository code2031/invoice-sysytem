<script type="text/javascript">
$(function () {

    $('.datepicker').datepicker({
      singleDatePicker: true,
      showDropdowns: true
    });

    $('#add-prod-btn').click(function (e) {
    	e.preventDefault();
    	var prod_form_section = $('#products-form-section');
    	var index = Number(prod_form_section.children().last().attr('data-index')) || 0;
    	prod_form_section.append(getProductsForm(index+1));
    });

    $(document).on('click', '.prod-delete-btn', function () {
    	$(this).parents('.product-form').remove();
    	if($('.prod-amnt').length === 0){
    		$('#total').val(0);
    	}else{
    		$('.prod-amnt').change();
    	}
    });

    $(document).on('change', '.prod-amnt', function () {
    	var total = 0;
    	$('.prod-amnt').each(function (index) {
    		console.log(index);
    		total+= Number($(this).val()) || 0;
    		$('#total').val(total);
    		return;
    	});
    });
});

function getProductsForm(index) {
	return $('<div class="row product-form" data-index="'+index+'">'+
      '<div class="form-group col-sm-6">'+
        '<label>Project Description</label>'+
       ' <input type="text" class="form-control" name="project_description[]">'+
     ' </div>'+
      '<div class="form-group col-sm-5">'+
       ' <label>Amount</label>'+
       ' <input type="number" min="0" class="form-control prod-amnt" name="amount[]">'+
      '</div>'+
      '<div class="form-group col-sm-1" style="margin-top: 30px">'+
       ' <a href="#" class="btn btn-danger prod-delete-btn"><span class="fa fa-trash"></span></a>'+
     '</div>');
                  
}
</script>

<!-- 
project['+index+'][description]
project['+index+'][amount] 
-->