// JavaScript Document
$(document).ready(function(e)
{

	$("select#fileupload_selectuser").select2({
	
		placeholder: "Select a User",
		allowClear: false
	}); 
	
	$("select#samplePapers_selectuser").select2({
	
		placeholder: "Select a User",
		allowClear: false
	}); 
	
	$("select#amcLoginToUser").select2({
	
		allowClear: false,
		minimumResultsForSearch: -1
	}); 
	
	
	$("select#category1").select2({
	
		allowClear: false
	}); 
	
	$("#user_create select#countrylist").select2({
	
		placeholder: "Choose Country",
		allowClear: false,
	}).select2('val','AU'); 
	
	 
	$("select#sample_papers").select2({
	
		allowClear: false,
		minimumResultsForSearch: -1
	});
	
	$("select#sample_papers_").select2({
	
		allowClear: false,
		minimumResultsForSearch: -1
	});

});