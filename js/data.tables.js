// JavaScript Document

$(document).ready(function()
{
	$('#usermanagetable').DataTable(	{"aoColumnDefs": [
														{ "bSortable": false, "aTargets": [ 5, 6,7 ] },
														{ "bSearchable": false, "aTargets": [ 5, 6,7 ] },
													],
										"aaSorting": [],"bPaginate":true,
      									"sPaginationType":"simple_numbers",
										"bAutoWidth": false ,
										}
									);
									
									
									
									
	$('#usermanagetable2').DataTable(	{"aoColumnDefs": [
														{ "bSortable": false, "aTargets": [ 4,7 ] },
														{ "bSearchable": false, "aTargets": [ 4,7 ] },
													],
										"aaSorting": [],"bPaginate":true,
      									"sPaginationType":"simple_numbers",
										"bAutoWidth": false ,
										"scrollY": "148px",
										"paging": false,
										"dom": '<"toolbar">frtip'
										}
									);
									
	$('#usermanagetable3').DataTable(	{"aoColumnDefs": [
														{ "bSortable": false, "aTargets": [ 4,7 ] },
														{ "bSearchable": false, "aTargets": [ 4,7 ] },
													],
										"aaSorting": [],"bPaginate":true,
      									"sPaginationType":"simple_numbers",
										"bAutoWidth": false ,
										"scrollY": "148px",
										"paging": false,
										"dom": '<"toolbar">frtip'
										}
									);
	
	$("div.toolbar").html('<div class="" style="margin:0 auto;font-size:18px;">Choose user</div>');
	
	
	
	
	$('#commenttable').DataTable({
									"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 1,3 ] },
														{ "bSearchable": false, "aTargets": [ 1,3 ] }	],
														"aaSorting": []
														});
	
	$('#samplepapers_usermanagetable').DataTable(	{"aoColumnDefs": [
														{ "bSortable": false, "aTargets": [ 4,7 ] },
														{ "bSearchable": false, "aTargets": [ 4,7 ] },
													],
										"aaSorting": [],"bPaginate":true,
      									"sPaginationType":"simple_numbers",
										"bAutoWidth": false ,
										"scrollY": "148px",
										"paging": false,
										"dom": '<"toolbar">frtip'
										}
									);
	
	////$('table.userdoclist').DataTable();
	
});
    