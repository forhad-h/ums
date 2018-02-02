$(document).ready(function(){
	//data table
	$('[data-table="true"]').DataTable();
	
	//Initialize Select2 Elements
	$('.select2').select2({
		minimumResultsForSearch: 9999999999999
	})

	//Date picker
	$('#joining_date').datepicker({
	  autoclose: true,
	  format: 'dd MM yyyy'
	})
	
	$('#payment_month').datepicker({
	  autoclose: true,
	  format: 'MM yyyy',
	  startView: "months", 
	  minViewMode: "months"
	})
	
	$('#payment_date').datepicker({
	  autoclose: true,
	  format: 'dd MM yyyy'
	})
	
	$('#bdate').datepicker({
	  autoclose: true,
	  format: 'dd MM yyyy'
	})
	
	$('#adate').datepicker({
	  autoclose: true,
	  format: 'dd MM yyyy'
	})
	
	$('#start_date').datepicker({
	  autoclose: true,
	  format: 'dd MM yyyy'
	})
	
	$('#end_date').datepicker({
	  autoclose: true,
	  format: 'dd MM yyyy'
	})
    // tooltip
	$('[data-toggle="tooltip"], [data-toggle="modal"]').tooltip();
	
	//iCheck for checkbox and radio inputs
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	  checkboxClass: 'icheckbox_minimal-blue',
	  radioClass   : 'iradio_minimal-blue'
	});
	//collapsed add system
	$('#btn-add, #btn-add-role').on('click', function() {
		if($(this).hasClass('collapsed')) {
			$('#'+$(this).attr('id')+' i.fa').css(
			{'transform' : 'rotate(-90deg)', '-o-transform' : 'rotate(-90deg)', '-ms-transform' : 'rotate(-90deg)', '-webkit-transform' : 'rotate(-90deg)'})
		}else {
			$('#'+$(this).attr('id')+' i.fa').css(
			{'transform' : 'rotate(0deg)', '-o-transform' : 'rotate(0deg)', '-ms-transform' : 'rotate(0deg)', '-webkit-transform' : 'rotate(0deg)'})
		}
	});
	
	$('#modal-form').on('submit', function() {
	    sessionStorage.setItem('url', $(this).attr('action'));
	});

	if(sessionStorage.getItem('url')) {
	    $('#modal-form').attr('action', sessionStorage.getItem('url'));
	}else {
		$('#modal-form').attr('action', '#');
	}
	
	sessionStorage.removeItem('url');
	
	// breadcrumbs icon
	$('.breadcrumb-item:first-child').before('<i class="fa fa-home icon-breadcrumbs"></i>');
	
	$("[role='alert']").delay(2000).fadeOut(500);
});

function confirmBox(thisElm, dType) {
	var oText = '';
	if(dType == 'delete') {
		oText = "You will not be able to recover this record.";
	}else {
		oText = "You will be able to recover this record in trash.";
	}
	swal({
	  title: "Are you sure?",
	  text: oText,
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Delete",
	});
	var url = $(thisElm).attr('href');
	$('.sa-confirm-button-container > button.confirm').on('click', function() {
		window.location = url;
	});
}

function softDelete(e, thisElm) {
	e.preventDefault();
	$.get(thisElm.href, function() {
		if($(thisElm).children('i.fa').hasClass('fa-eye')) {
		    $(thisElm).children('i.fa').removeClass('fa-eye').addClass('fa-eye-slash');
		}else{
			$(thisElm).children('i.fa').removeClass('fa-eye-slash').addClass('fa-eye');
		}
	});
}

function setAction(thisElm) {
	$('#modal-form').attr('action', $(thisElm).attr('data-link'));
}
