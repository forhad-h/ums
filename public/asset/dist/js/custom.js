$(document).ready(function(){
	//data table
	$('#allTeacher').DataTable();
	
	//Initialize Select2 Elements
	$('.select2').select2({
		minimumResultsForSearch: 9999999999999
	})

	//Date picker
	$('#joining_date').datepicker({
	  autoclose: true,
	  format: 'd MM yyyy'
	})
	
	$('#b_date').datepicker({
	  autoclose: true,
	  format: 'd MM yyyy'
	})

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