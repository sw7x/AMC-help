// JavaScript Document



$(document).on('click','.delete_user', function (event)
{
	event.preventDefault();
	event.stopPropagation();
	
	//alert('fffffffffffffff');
	var userid = $(this).data('user');
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/user_delete.php",
		async:true,
		data:{userid : userid,},
		success:function(data)
		{
			
			if(data['result']==true)
			{
				
				var  parent_re_element = $('tr#row'+userid);
				//alert('tr#'+userid);
				parent_re_element.remove();
				parent_re_element.empty();
				delete parent_re_element;
				bootbox.alert("Delete Successful", function(){});
			
			}
			else
			{
				bootbox.alert("Unable To Delete", function(){});
			}
			
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
	 
});


$(document).on('click', '.block_docmanage', function (event)
{
	
	var doc_id = $(this).data('docid');
	
	var userid = $('.user_doclistdiv > div').data('userid');
	//alert('++++++++'+userid);
	
	/*
	alert($(this).closest('.panel.panel-default.level1').find('.panel-headinglevel1 > h4 > .docmgCategoryBlock').data('categoryid'));
	alert($(this).closest('.panel.panel-default.level2').find('.panel-headinglevel2 > h4 > .docmgCategoryBlock').data('categoryid'));
	alert($(this).closest('.panel.panel-default.level3').find('.panel-headinglevel3 > h4 > .docmgCategoryBlock').data('categoryid'));
	*/
	
	cl1ele = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel1 > h4 > .docmgCategoryBlock');
	cl2ele = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel2 > h4 > .docmgCategoryBlock');
	cl3ele = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel3 > h4 > .docmgCategoryBlock');
	
	
	
	
	
	
	cl1 =  $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel1 > h4 > .docmgCategoryBlock').data('categoryid');
	cl2 = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel2 > h4 > .docmgCategoryBlock').data('categoryid');
	cl3 = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel3 > h4 > .docmgCategoryBlock').data('categoryid');
	
	
	//alert(doc_id);
	
	var cd = $(this).parent();
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/doc_list.php",
		async:true,
		data:{doc_id : doc_id,task : 'block'},
		success:function(html)
		{
			
			cd.html(html);
			
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
	
	if(cl1==null){cl1='invalid';}
	if(cl2==null){cl2='invalid';}
	if(cl3==null){cl3='invalid';}
	
	
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/doc_list.php",
		async:true,
		data:{task:'allcategorystat',userid:userid,cl1:cl1,cl2:cl2,cl3:cl3},
		success:function(data)
		{
			if(cl1!=null)
			{
				if(data['cl1status']==true)
				{
					cl1ele.removeClass('btn-success').addClass('btn-danger');
					cl1ele.html('');
					cl1ele.html('<span class="glyphicon glyphicon-lock"></span>');
					//remove highligh clas add danger class
				}
				else
				{	cl1ele.removeClass('btn-danger').addClass('btn-success');
					cl1ele.html('');
					cl1ele.html('<span class="glyphicon glyphicon-ok"></span>');
					//remove danger clas add highligh class
				}
			
			}
			if(cl2!=null)
			{
				if(data['cl2status']==true)
				{
					cl2ele.removeClass('btn-success').addClass('btn-danger');
					cl2ele.html('');
					cl2ele.html('<span class="glyphicon glyphicon-lock"></span>');
					//remove highligh clas add danger class
				}
				else
				{	cl2ele.removeClass('btn-danger').addClass('btn-success');
					cl2ele.html('');
					cl2ele.html('<span class="glyphicon glyphicon-ok"></span>');
					//remove danger clas add highligh class
				}	
				
			}
			if(cl3!=null)
			{
				if(data['cl3status']==true)
				{
					cl3ele.removeClass('btn-success').addClass('btn-danger');
					cl3ele.html('');
					cl3ele.html('<span class="glyphicon glyphicon-lock"></span>');
					//remove highligh clas add danger class
				}
				else
				{	cl3ele.removeClass('btn-danger').addClass('btn-success');
					cl3ele.html('');
					cl3ele.html('<span class="glyphicon glyphicon-ok"></span>');
					//remove danger clas add highligh class
				}		
				
			}
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
	
	
	event.preventDefault();
	
});


$(document).on('click', '.deleteDocmanage', function (event)
{
	//alert(doc_id);
	var doc_id = $(this).data('docid');
	$('#docmg_delete-'+doc_id).modal('show');
	//show model
	
});

$(document).on('click', '.delete_docmanage', function (event)
{
	var doc_id = $(this).data('docid');
	//alert(doc_id);
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/doc_list.php",
		async:true,
		data:{doc_id : doc_id,task : 'delete'},
		success:function(data)
		{
			if(data['result']==true)
			{
				var  parent_tr_element_delete = $('tr.doc__'+doc_id);
				parent_tr_element_delete.remove();
				parent_tr_element_delete.empty();
				delete parent_tre_element_delete;
			}
			else
			{
				bootbox.alert("Unable To Delete", function(){});
			}
		
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});/*	*/
	
	event.preventDefault();
	event.stopPropagation();
});

////////////////////////////////////////////////////////////////

$(document).on('click', '.disable_user,.enable_user', function (event)
{
	event.preventDefault();
	event.stopPropagation();
	
	var userid = $(this).data('id');
	//alert(userid);
	
	var ab = $(this).parent();
	
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/account-status.php",
		async:true,
		data:{userid : userid},
		success:function(html)
		{
			
			ab.html(html);
			
			
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});	

});




////////////////////////////////////////////////////////////////
$(document).on('change', '#countrylist', function (event)
{
	//event.preventDefault();
	//event.stopPropagation();
	
	var country = $(this).val();
	//alert(country);
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/telephone_code.php",
		async:true,
		data:{country : country},
		success:function(data)
		{
			$('input[name=tp_country]').val(data['tpcode']);
			$('input[name=tp__country]').val(data['tpcode']);
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
});


/*------------ document load   -----------*/
$(document).ready(function(e)
{	
	$('input[name=tp_country]').val('+61');
   	$('input[name=tp_country]').prop('disabled', true);
	
	$('#help_submit').click(function(event){
		
		//event.stopPropagation();
		//event.preventDefault();
		//$('#modal-container-857150').modal('show');
	});
	
	
	
	
	
	
	$('.readonline').click(function(event)
	{
		event.preventDefault();
		event.stopPropagation();

		$('#flashcontent').html('');
		
		var loadingHTML = 	"<div class='pdfdiv'>"+
								'<img src="images/loading-blue.gif" alt="" />'+
							'</div>';
							
		$('#flashcontent').html(loadingHTML);
		
		var filename = $(this).data('file');
		// alert(userid);
		// alert(filename);
		
		$.ajax(
		{
			type: "POST",
			dataType:'json',
			url:"./ajax/doc_generator.php",
			async:false,
			data:{filename : filename,id : userid},
			success:function(data)
			{	
				//alert(data['doc_name']);
				//alert(data['username']);
				//alert(data['filename']);
			
				// var so = new SWFObject("./admin/upload/" + data['username'] + "/" + data['filename'], "customRightClick", "100%", "622", "10.0.0", "#CCCCCC");
			  
			 //  	so.addParam("quality", "high");
				// so.addParam("name", "customRightClick");
				// so.addParam("id", "customRightClick");
				// so.addParam("AllowScriptAccess", "always");
				// so.addParam("wmode", "opaque");
				// so.addParam("menu", "false");
				// so.addParam("allowFullScreen","true");
				
				// so.addVariable("variable1", "value1");
				// so.write("flashcontent");
				// $('#flashcontent').html()

 				$('.pdfdiv').html('')


				var imgUrl = "./admin/upload/" + data['username'] + "/" + data['filename'];
				$('.pdfdiv').prepend('<img id="theImg" src="' + imgUrl + '" />');
				
				$('.docname').html('');	
				$('.docname').html(data['doc_name']);
			},
			error:function(request,errorType,errorMessage) 
			{
				alert ('error - '+errorType+'with message - '+errorMessage);
			}
		});		
		
		
		
	});

	 
	$('select#amcLoginToUser').change(function(event)
	{
		//alert('qqqqqqqqqqqqqqqqqqqqqqqqqq1');
		$('textarea.samplePapersLink').val('');
		$('#seLink').css('display','none');
		$('#gnLink').css('display','block');
	
	});	

	/**/
	


});   
//_end of document ready__


function clearinputs()
{
	//$(this)[0].reset();
	$("#user_create")[0].reset();
}


$(document).on('click','.categoryupdate', function (event)
{
	event.preventDefault();
	event.stopPropagation();
	
	categoryupdateid = $(this).data('cid');
	categoryname = $(this).data('categoryname');
	//alert(categoryupdateid);
	
	$.ajax(
		{
			type: "POST",
			dataType:'json',
			url:"../admin/ajax/categoydetails.php",
			async:true,
			data:{categoryid : categoryupdateid},
			success:function(data)
			{	
				//alert('^^^^^^^^^');
				if(data['category']=='')
				{
					// failed
					bootbox.alert("Cant Get Data From Database", function(){});
				}
				else
				{
					$('#category-update').modal('show');
					$('input[name=update__category]').val(data['category']);
					$('input[name=categoryupdateid]').val(data['categoryid']);
					
				}
				
			},
			error:function(request,errorType,errorMessage) 
			{
				alert ('error - '+errorType+'with message - '+errorMessage);
			}
		});	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
});


$(document).on('submit', '#categoryupdateform', function (event)
{
	event.preventDefault();
	event.stopPropagation();

	category_name = $('input[name=update__category]').val();
	categoryupdate_id = $('input[name=categoryupdateid]').val();

	if(category_name=='')
	{
		bootbox.alert("Category Name Canot be Empty", function(){});
	}
	else
	{
		$.ajax(
		{
			type: "POST",
			dataType:'json',
			url:"./ajax/categoryupdate.php",
			async:true,
			data:{id : categoryupdate_id,name : category_name},
			success:function(data)
			{	
				
				if(data['result']==true)
				{
					//update scuccess full
					//close modal
					$('#category-update').modal('hide');
					//change dom
					//$('tr#updaterow'+categoryupdate_id+' td:nth-child(1)').html(category_name);
					$('h4.h4-'+categoryupdate_id+' a:nth-child(1)').html(category_name); 
					
				}
				else if(data['result']==false)
				{
					//update failed
					bootbox.alert("Update Failed", function(){});
				}
				else
				{
					bootbox.alert("Category Exists Please Choose Anothe Name", function(){});
				}
				
			},
			error:function(request,errorType,errorMessage) 
			{
				alert ('error - '+errorType+'with message - '+errorMessage);
			}
		});	
		
	}

	
		
		
});


$(document).on('click','.delete_comment', function (event)
{
	event.preventDefault();
	event.stopPropagation();
	
	var commmentid = $(this).data('commentid');
	//alert(commmentid);
	
	bootbox.confirm("Are sure you want to delete User Comment!", function(del)
	{
		//Example.show("Confirm result: "+result);
		//alert(r);


		if (del == true)
		{
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/commentdelete.php",
				async:true,
				data:{commmentid : commmentid},
				success:function(data)
				{	
					
					if(data['result']==true)
					{
						$('#comment_deletefinish').modal('show');
						//change dom
						var  parent_tr_element_delete = $('tr#commentrow'+commmentid);
						parent_tr_element_delete.remove();
						parent_tr_element_delete.empty();
						delete parent_tre_element_delete;
					}
					else
					{
						$('#comment_deleteerror').modal('show');
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});	
		}
		else
		{
			
			
		}
	});
	
});


$(document).on('click', '.userselect_docup', function (event)
{
	$('.userselect_docup.btn-success').removeClass('btn-success').addClass('btn-info');
	
	
	var docup_userid = $(this).data('userid');
	//alert(docup_userid);
	
	$("#fileupload_selectuser").select2("val", docup_userid);
	
	$(this).removeClass('btn-info');
	$(this).addClass('btn-success');
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/user_update.php",
		async:true,
		data:{updateid:docup_userid,task:'view'},
		success:function(data)
		{	
			
			if(data['result']==true)
			{
				$('.amcinfo').html(data['amc']);
			}
			else
			{
				$('.amcinfo').html('');
				//TO DO modal appera
				//$('#comment_deletefinish').modal('show');
			}
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});	
	
	
});





$(document).on('click', '.userselect_sample', function (event)
{
	$('.userselect_sample.btn-success').removeClass('btn-success').addClass('btn-info');
	$('textarea.samplePapersLink').val('');
	$('#seLink').css('display','none');
	$('#gnLink').css('display','block');	
	
	var userid = $(this).data('userid');
	//alert(docup_userid);
	
	$("#samplePapers_selectuser").select2("val", userid);
	
	$(this).removeClass('btn-info');
	$(this).addClass('btn-success');
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/user_update.php",
		async:true,
		data:{updateid:userid,task:'view'},
		success:function(data)
		{	
			
			if(data['result']==true)
			{
				$('.amcinfo').html(data['amc']);
				$('form#samplePapers input[name=samplePapersEmail]').val(data['email']);
			}
			else
			{
				$('.amcinfo').html('');
				//TO DO modal appera
				//$('#comment_deletefinish').modal('show');
			}
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});	
	
	
});



$(document).on('change', '#fileupload_selectuser', function (event)
{
	//remove selection
	$('.userselect_docup').removeClass('btn-success').addClass('btn-info');
	
	var docup_userid_ = $(this).val();
	//alert(docup_userid_);
	
	$('.userselect_docup[data-userid="'+docup_userid_+'"]').removeClass('btn-info').addClass('btn-success');
	
	$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/user_update.php",
				async:true,
				data:{updateid:docup_userid_,task:'view'},
				success:function(data)
				{	
					
					if(data['result']==true)
					{
						$('.amcinfo').html(data['amc']);
					}
					else
					{
						$('.amcinfo').html('');
						//TO DO modal appera
						//$('#comment_deletefinish').modal('show');
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});	
});







$(document).on('change', '#samplePapers_selectuser', function (event)
{
	//remove selection
	$('.userselect_sample').removeClass('btn-success').addClass('btn-info');
	$('textarea.samplePapersLink').val('');
	$('#seLink').css('display','none');
	$('#gnLink').css('display','block');
	
	var userid_ = $(this).val();
	///alert(userid_);
	
	$('.userselect_sample[data-userid="'+userid_+'"]').removeClass('btn-info').addClass('btn-success');
	
	$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/user_update.php",
				async:true,
				data:{updateid:userid_,task:'view'},
				success:function(data)
				{	
					
					if(data['result']==true)
					{
						$('.amcinfo').html(data['amc']);
						$('form#samplePapers input[name=samplePapersEmail]').val(data['email']);
					}
					else
					{
						$('.amcinfo').html('');
						//TO DO modal appera
						//$('#comment_deletefinish').modal('show');
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});/*		*/
});




$(document).on('click', '.userselect_docmanage', function (event)
{
	
	$('.userselect_docmanage.btn-success').removeClass('btn-success').addClass('btn-info');
	
	var loadingHTML = 	"<div class='categoryLoadiDdiv'>"+
							'<img src="../images/vloading.gif" alt="" />'+
						'</div>';
							
	$('.user_doclistdiv').html(loadingHTML);
	
	var docmg_userid = $(this).data('userid');
	//alert(docmg_userid);
	
	//$("#fileupload_selectuser").select2("val", docup_userid);
	
	$(this).removeClass('btn-info');
	$(this).addClass('btn-success');
	
		
	//$('.user_doclistdiv').load("../admin/ajax/doc_list.php?docmg_userid="+docmg_userid+"&task=view");
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/doc_list.php",
		async:true,
		data:{docmg_userid:docmg_userid,task:'view'},
		success:function(html)
		{	
			//$('.userdoclist').DataTable();
			$('.user_doclistdiv').html(html);
			
			//$('.userdoclist').css('display','none');
			//$('.userdoclist').DataTable({}).destroy();;
			
			
		
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		},
		complete:function(html)
		{
				
		}
	});
	
	/**/	
	
	
	
});


$(document).on('click', '.upload_reset', function (event)
{
	
	$('table#upload_doclist thead').html('');
	$('table#upload_doclist tbody').html('');
	
	//userselect table green reset
	$('.userselect_docup.btn-success').removeClass('btn-success').addClass('btn-info');
	
	//user selecttag
	$("#fileupload_selectuser").select2('data', null)
	
	//category selecttag reset
	$("select#category1").select2().select2('val',0); 
	$("select#category2").select2().select2('val',0); 
	$("select#category3").select2().select2('val',0); 
	
	$('.form-group.subcategory').html('');
    $('.form-group.sub-subcategory').html('');
     
	$(this).css('display','none');                    
    //alert('---=====');
	
});

$(document).on('click', '.docmgCategoryBlock', function (event)
{
	var docmgCategoryID = $(this).data('categoryid');
	var userID = $('.user_doclistdiv div').data('userid');
	
	//alert(docmgCategoryID);
	//alert(userID)
	
	cl1ele = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel1 > h4 > .docmgCategoryBlock');
	cl2ele = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel2 > h4 > .docmgCategoryBlock');
	cl3ele = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel3 > h4 > .docmgCategoryBlock');
	
	cl1 = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel1 > h4 > .docmgCategoryBlock').data('categoryid');
	cl2 = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel2 > h4 > .docmgCategoryBlock').data('categoryid');
	cl3 = $(this).closest('.panel.panel-default.level1').find('.panel-headinglevel3 > h4 > .docmgCategoryBlock').data('categoryid');
	
	
	c1table = $(this).closest('.panel.panel-default.level1').find('.panel-collapselevel1 > .panel-body > div > table');
	c2table = $(this).closest('.panel.panel-default.level1').find('.panel-collapselevel2 > .panel-body > div > table');
	c3table = $(this).closest('.panel.panel-default.level1').find('.panel-collapselevel3 > .panel-body > div > table');
	
	c1tableblock = c1table.find('tr > td > .block_docmanage').addClass('t1');
	c2tableblock = c2table.find('tr > td > .block_docmanage').addClass('t2');
	c3tableblock = c3table.find('tr > td > .block_docmanage').addClass('t3');
	
	if(cl1==null){cl1='invalid';}
	if(cl2==null){cl2='invalid';}
	if(cl3==null){cl3='invalid';}
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/doc_list.php",
		async:true,
		data:{docmgCategoryID:docmgCategoryID,task:'categoryblock',userID:userID,cl1:cl1,cl2:cl2,cl3:cl3},
		success:function(data)
		{	
			
			//$('.user_doclistdiv').load("../admin/ajax/doc_list.php?docmg_userid="+userID+"&task=view");
			
			if(data['blockCategoryAllDocStat'])
			{
				
				if(data['categoryLevel1'])
				{	
					cl1ele.removeClass('btn-success').addClass('btn-danger');
					cl1ele.html('');
					cl1ele.html('<span class="glyphicon glyphicon-lock"></span>');
					
					if(cl1 == docmgCategoryID)
					{
						c1tableblock.removeClass('btn-success').addClass('btn-danger');
						c1tableblock.html('');
						c1tableblock.html('<span class="glyphicon glyphicon-lock"></span>');
					}
				}
				else
				{
					cl1ele.removeClass('btn-danger').addClass('btn-success');
					cl1ele.html('');
					cl1ele.html('<span class="glyphicon glyphicon-ok"></span>');
					
					if(cl1 == docmgCategoryID)
					{
						c1tableblock.removeClass('btn-danger').addClass('btn-success');
						c1tableblock.html('');
						c1tableblock.html('<span class="glyphicon glyphicon-ok"></span>');
					}
				}
				
				if(data['categoryLevel2'])
				{	
					cl2ele.removeClass('btn-success').addClass('btn-danger');
					cl2ele.html('');
					cl2ele.html('<span class="glyphicon glyphicon-lock"></span>');
					
					if(cl1 == docmgCategoryID || cl2 == docmgCategoryID)
					{
						c2tableblock.removeClass('btn-success').addClass('btn-danger');
						c2tableblock.html('');
						c2tableblock.html('<span class="glyphicon glyphicon-lock"></span>');
					}
				}
				else
				{
					cl2ele.removeClass('btn-danger').addClass('btn-success');
					cl2ele.html('');
					cl2ele.html('<span class="glyphicon glyphicon-ok"></span>');
					
					if(cl1 == docmgCategoryID || cl2 == docmgCategoryID)
					{
						c2tableblock.removeClass('btn-danger').addClass('btn-success');
						c2tableblock.html('');
						c2tableblock.html('<span class="glyphicon glyphicon-ok"></span>');
					}
				}
				
				if(data['categoryLevel3'])
				{	
					cl3ele.removeClass('btn-success').addClass('btn-danger');
					cl3ele.html('');
					cl3ele.html('<span class="glyphicon glyphicon-lock"></span>');
					
					if(cl1 == docmgCategoryID || cl2 == docmgCategoryID || cl3 == docmgCategoryID)
					{	
						c3tableblock.removeClass('btn-success').addClass('btn-danger');
						c3tableblock.html('');
						c3tableblock.html('<span class="glyphicon glyphicon-lock"></span>');
					}
				}
				else
				{
					cl3ele.removeClass('btn-danger').addClass('btn-success');
					cl3ele.html('');
					cl3ele.html('<span class="glyphicon glyphicon-ok"></span>');
					
					if(cl1 == docmgCategoryID || cl2 == docmgCategoryID || cl3 == docmgCategoryID)
					{	
						c3tableblock.removeClass('btn-danger').addClass('btn-success');
						c3tableblock.html('');
						c3tableblock.html('<span class="glyphicon glyphicon-ok"></span>');
					}
				}
				
				
			}
			else
			{
				$('#categoryManageFaild').modal('show');
			}
		
			//$('.user_doclistdiv').html(html);
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});	



});


$(document).on('click', '.generatelink', function (event)
{
	var amcversion = $('select#amcLoginToUser').val();
	var user = $('select#samplePapers_selectuser').val();
	var email = $('input#samplePapersEmail').val();
	
	/*
	alert('amcversion'+amcversion);
	alert('user'+user);
	alert('email'+email);
	*/
	
	if(amcversion=='' || typeof amcversion == 'undefined' || amcversion==null)
	{
		$('#samplePapers_invalidInfo').modal('show');
		return false;
	}
	if(user=='' || typeof user == 'undefined' || user==null)
	{
		$('#samplePapers_invalidInfo').modal('show');
		return false;
	}
	if(email=='' || typeof email == 'undefined' || email==null)
	{
		$('#samplePapers_invalidInfo').modal('show');
		return false;
	}
	
	
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/samplepapers_email.php",
		async:true,
		data:{amcversion:amcversion,user:user,email:email,task:'generate'},
		success:function(data)
		{	
			//alert(data['emaillink']);
			if(data['emaillink']!=='')
			{
				$('#seLink').css('display','block');
				$('textarea.samplePapersLink').val(data['emaillink']);
				$('#gnLink').css('display','none');	
			}
			else
			{
				$('#samplePapers_emailGnError').modal('show');
			}
			
			
			/*if(data['blockCategoryAllDocStat'])
			{
				//TO DO Dom manipulation
			}
			else
			{
				$('#categoryManageFaild').modal('show');
			}*/
		
			//$('.user_doclistdiv').html(html);
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});	

});


$(document).on('click', '.emaillink', function (event)
{
	var emaillink_ = $('textarea.samplePapersLink').val()
	var email = $('input#samplePapersEmail').val();
	
	if(emaillink_=='')
	{
		$('#samplePapers_invalidInfo').modal('show');
		return false;
	}
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/samplepapers_email.php",
		async:true,
		data:{emaillink:emaillink_,task:'send',email:email},
		success:function(data)
		{	
			
			if(data['isEmailAccepted']==false)
			{
				$('#samplePapers_emailnotsend').modal('show');
				
				
				
				//$('#seLink').css('display','block');
				//$('textarea.samplePapersLink').val(data['emaillink']);
			}
			else
			{
				$('#samplePapers_emailsend').modal('show');
				$('input#samplePapersEmail').val('');
				$('select#samplePapers_selectuser').select2("val", "");
				$('.amcinfo').html('');
				$('.userselect_sample').removeClass('btn-success').addClass('btn-info');
				$('textarea.samplePapersLink').val('');
				$('#gnLink').css('display','block');
				$('#seLink').css('display','none');
			}
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});	
});