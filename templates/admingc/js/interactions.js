$(document).ready(function(){
	/*$(".single-image").mxnphpSingleImage();
	$(".multi-image").mxnphpMultiImage();*/
	$("#menu").mxnphpAdminMenu();
	$("#content .menu a").mxnphpAdminSubmenu();	
	$("#content .tabs a").mxnphpAdminTabs();	
	$("#messages a").mxnphpAdminMessages();
	$("a.delete").mxnphpAdminDelete();
	$("select.multi-select-new").mxnphpMultiSelect();
	$("select.multi-select-edit").mxnphpMultiEdit();
	$(".single-image").mxnphpSingleImage();
	$(".multi-image").mxnphpMultiImage();
	$('.footable').footable();


	$('.customDatePicker').datetimepicker({format:'Y-m-d H:i:s'});	

	$('.delete-register').click(function(e){
		e.preventDefault();
		$('#delete_box').modal('show');
		$('#delete_box #delete-url').attr('value',$(this).attr('href'));
	});

	$(document).on('click','.delete-register',function(e){
		e.preventDefault();
		$('#delete_box').modal('show');
		$('#delete_box #delete-url').attr('value',$(this).attr('href'));
	});

	$('#delete_box #delete-button').click(function(e){
		var url = $('#delete_box #delete-url').attr('value');
		var siteUrl = location.protocol + "//" + location.host + ':' + location.port;
		window.location = siteUrl +  '/' + url;
	});
});
