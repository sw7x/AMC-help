// JavaScript Document


/*----------        firstst  tab         --------*/

$('#add-main-category1').typing(
{
    start: function (event, $elem)
	{
        //$elem.css('background', '#fa0');
    },
    stop: function (event, $elem)
	{
        //$elem.css('background', '#f00');
		
		//var maincat1 = $(this).val();
		var maincat1 = $elem.val(); 
		//alert(maincat1);
	
	
		if(maincat1=='')
		{
			$("#add-main-category1_submit").css("display","none");
			$("#add-main-category1_reset").css("display","none");
			$("#hint1").html('main category cannot be empty').removeClass('green').addClass('red');
		}
		else
		{
			//$("add-main-category1_reset").css("display","block");
			
		//}
			$.ajax({
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/check_category.php",
				async:true,
				data:{maincatpost:maincat1},
				success:function(data)
				{
					if(data['main'] =='main_0')
					{
						$("#hint1").html('main category exists or cannot use').removeClass('green').addClass('red');
						$("#add-main-category1_submit").css("display","none");
						$("#add-main-category1_reset").css("display","block");
					}
					else if(data['main'] =='main_1')
					{
						//$("#hint1").html('Main category available').removeClass('red').addClass('green');
						$("#hint1").html('');
						$("#add-main-category1_submit").css("display","block");
						$("#add-main-category1_reset").css("display","block");
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});
			
		}
		},
		delay: 800
});




/*----------       2nd tab         --------*/

$(document).on('change', '#category2 #maincategory2', function (event)
{
	$('.sub-subcategory').html('');
	$("#lbl_subcategory2__").css("display","block");
	$("#subcategory2__").css("display","block");
	
	var maincat2 = $(this).val();
	var subcat2 =  $('#subcategory2__').val(); 
	
	//alert(subcat2);
	//alert(maincat2);
	
	if(subcat2=='')
	{
		$("#add-level2-category-reset").css("display","none");
		$("#add-level2-category-submit").css("display","none");
		$("#hint2").html('level 2 sub category cannot be empty').removeClass('green').addClass('red');
	}
	else
	{
		//$("add-main-category1_reset").css("display","block");
		
		//}
		$.ajax({
			type: "POST",
			dataType:'json',
			url:"../admin/ajax/check_category.php",
			async:true,
			data:{subcatpost:subcat2,maincatpost:maincat2},
			success:function(data)
			{	
				
				if(data['main->sub'] =='0')
				{
					$("#hint2").html('level 2 sub category exists or cannot use').removeClass('green').addClass('red');
					$("#add-level2-category-submit").css("display","none");
					$("#add-level2-category-reset").css("display","block");
				}
				else if(data['main->sub'] =='1')
				{
					//$("#hint2").html('level 2 sub category available').removeClass('red').addClass('green');;
					$("#hint2").html('');
					$("#add-level2-category-submit").css("display","block");
					$("#add-level2-category-reset").css("display","block");
				}
			},
			error:function(request,errorType,errorMessage) 
			{
				alert('error - '+errorType+'with message - '+errorMessage);
			}
		});
		
	}	
});



$('#subcategory2__').typing(
{
    start: function (event, $elem)
	{
        //$elem.css('background', '#fa0');
    },
    stop: function (event, $elem)
	{
        //$elem.css('background', '#f00');
		
		var maincat2 = $('#maincategory2').val(); 
		//var subcat2 = $(this).val(); 
		var subcat2 = $elem.val(); 
		
		//alert(subcat2);
		//alert(maincat2);
		
		if(subcat2=='')
		{
			$("#add-level2-category-reset").css("display","none");
			$("#add-level2-category-submit").css("display","none");
			$("#hint2").html('Level 2 Sub Category Cannot be Empty').removeClass('green').addClass('red');
		}
		else
		{
			//$("add-main-category1_reset").css("display","block");
			
			//}
			$.ajax({
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/check_category.php",
				async:true,
				data:{subcatpost:subcat2,maincatpost:maincat2},
				success:function(data)
				{	
					
					if(data['main->sub'] =='0')
					{
						$("#hint2").html('level 2 sub category exists or cannot use').removeClass('green').addClass('red');
						$("#add-level2-category-submit").css("display","none");
						$("#add-level2-category-reset").css("display","block");
					}
					else if(data['main->sub'] =='1')
					{
						//$("#hint2").html('level 2 sub category available').removeClass('red').addClass('green');
						$("#hint2").html('');
						$("#add-level2-category-submit").css("display","block");
						$("#add-level2-category-reset").css("display","block");
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});
			
		}
			
			
	},
	delay: 400
});





/*----------       3rd tab        --------*/
$(document).on('change', '#category3 #maincategory2', function (event)
{
	$('#category3 div #hint3').css("display","none");
	$("#category3 #sub-subcategory3").css("display","none");
	$("#category3 #lbl_subsubcategory3").css("display","none");
	$('#category3 #subcategory3-div').css("display","none");
	$("#add-level3-category-submit").css("display","none");
	$("#add-level3-category-reset").css("display","none");
	
	
	var maincat3 = $('#category3 #maincategory2').val();
	
	
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/sub-category.php",
		async:true,
		data:{maincatvalue:maincat3},
		success:function(html)
		{	
			if(html==false)
			{
				$('#category3 div #hint3').css("display","block");
				$('#category3 div #hint3').html('Without Having Level 2 category Cannot Add Level3 Category').removeClass('green').addClass('red');
			}
			else
			{
				$('#category3 #subcategory3-div').html(html);
				$('#subcategory3-div').css("display","block");
				
				$("#category3 #subcategory3-div #subcategory3").select2({
												placeholder: "-- Select Sub Category --",
												allowClear: false,
												});
			}
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
	
	
	/*var subcat3 =  $('#category3 #subcategory3').val(); 
	var sub_subcat3 = $('#category3 #sub-subcategory3').val();
	
	//alert('main -'+maincat3);
	//alert('level2 -'+subcat3);
	//alert('sub-sub -'+sub_subcat3);
	
		
	if(sub_subcat3=='')
	{
		$("#add-level3-category-reset").css("display","none");
		$("#add-level3-category-submit").css("display","none");
		$("#hint3").html('level 3 sub category cannot be empty').removeClass('green').addClass('red');
	}
	else
	{
		$.ajax({
			type: "POST",
			dataType:'json',
			url:"../admin/ajax/check_category.php",
			async:true,
			data:{subcatpost:subcat3,maincatpost:maincat3,sub_subcatpost:sub_subcat3},
			success:function(data)
			{	
				
				if(data['main->sub->sub'] =='0')
				{
					$("#hint3").html('Without Having Level 2 category Cannot Add Level3 Category -2').removeClass('green').addClass('red');
					$("#add-level3-category-submit").css("display","none");
					$("#category3 #sub-subcategory3").css("display","none");
					$("#add-level3-category-reset").css("display","none");
				}
				else if(data['main->sub->sub'] =='1')
				{
					//$("#hint3").html('level 3 sub category available').removeClass('red').addClass('green');
					$("#hint3").html('');
					$("#add-level3-category-submit").css("display","block");
					$("#add-level3-category-reset").css("display","block");
					$("#category3 #sub-subcategory3").css("display","block");
				}
			},
			error:function(request,errorType,errorMessage) 
			{
				alert ('error - '+errorType+'with message - '+errorMessage);
			}
		});
		
	}	*/
});



$(document).on('change','#category3 #subcategory3', function (event)
{
	//alert('yii');
	
	$("#category3 #sub-subcategory3").css("display","block");
	$("#category3 #lbl_subsubcategory3").css("display","block");
	//$("#category3 #sub-subcategory3").html('');
	//$('#category3 #subcategory3-div').css("display","none");
	//$("#add-level3-category-submit").css("display","none");
	//$("#add-level3-category-reset").css("display","none");
	$("#category3 div #hint3").css("display","block");
	
	var maincat3 = $('#category3 #maincategory2').val();
	var subcat3 =  $('#category3 #subcategory3').val(); 
	var sub_subcat3 = $('#category3 #sub-subcategory3').val();
	
	//alert('subcat2');
	//alert(maincat2);
	
	if(sub_subcat3=='')
	{
		$("#add-level3-category-reset").css("display","none");
		$("#add-level3-category-submit").css("display","none");
		$("#category3 div #hint3").css("display","block");
		$("#category3 div #hint3").html('Level 3 Sub Category Cannot be Empty').removeClass('green').addClass('red');
	}
	else
	{
		$.ajax({
			type: "POST",
			dataType:'json',
			url:"../admin/ajax/check_category.php",
			async:true,
			data:{subcatpost:subcat3,maincatpost:maincat3,sub_subcatpost:sub_subcat3},
			success:function(data)
			{	
				
				if(data['main->sub->sub'] =='0')
				{
					$("#hint3").html('Level 3 Sub Category Exists Or Cannot Use').removeClass('green').addClass('red');
					$("#add-level3-category-submit").css("display","none");
					$("#add-level3-category-reset").css("display","block");
					
				}
				else if(data['main->sub->sub'] =='1')
				{
					//$("#hint3").html('Level 3 Sub Category Available').removeClass('red').addClass('green');
					$("#hint3").html('');
					$("#add-level3-category-submit").css("display","block");
					$("#add-level3-category-reset").css("display","block");
				}
			},
			error:function(request,errorType,errorMessage) 
			{
				alert ('error - '+errorType+'with message - '+errorMessage);
			}
		});
		
	}	

});




$('#sub-subcategory3').typing(
{
    start: function (event, $elem)
	{
        //$elem.css('background', '#fa0');
    },
    stop: function (event, $elem)
	{
        //$elem.css('background', '#f00');
		
		var maincat3 = $('#maincategory2').val();
		var subcat3 =  $('#subcategory3').val(); 
		var sub_subcat3 = $('#sub-subcategory3').val();
		
		/*alert('level2 -'+subcat3);
		alert('main -'+maincat3);
		alert('sub-sub -'+sub_subcat3);*/
		
		if(sub_subcat3=='')
		{
			$("#add-level3-category-reset").css("display","none");
			$("#add-level3-category-submit").css("display","none");
			$("#hint3").html('level 3 sub category cannot be empty').removeClass('green').addClass('red');
		}
		else
		{
			$.ajax({
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/check_category.php",
				async:true,
				data:{subcatpost:subcat3,maincatpost:maincat3,sub_subcatpost:sub_subcat3},
				success:function(data)
				{	
					
					if(data['main->sub->sub'] =='0')
					{
						$("#hint3").html('level 3 sub category Already Exists').removeClass('green').addClass('red');
						$("#add-level3-category-submit").css("display","none");
						$("#add-level3-category-reset").css("display","block");
					}
					else if(data['main->sub->sub'] =='1')
					{
						//$("#hint3").html('level 3 sub category available').removeClass('red').addClass('green');
						$("#hint3").html('');
						$("#add-level3-category-submit").css("display","block");
						$("#add-level3-category-reset").css("display","block");
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});
			
		}	
		
		
    },
    delay: 400
});




/*---   Delete category   ----------------*/

$(document).on('click', '.deletelink', function (event)
{
	var deletecatid = $(this).data("deletecat");
	//alert(deletecatid);
	
	bootbox.confirm("Are sure you want to delete category!", function(r)
	{
		//Example.show("Confirm result: "+result);
		//alert(r);
		
		if (r == true)
		{
			$.ajax({
				type: "POST",
				dataType:'html',
				url:"../admin/ajax/delete-category.php",
				async:true,
				data:{deletecatid:deletecatid},
				success:function(html)
				{	
					
					if(html=='<span>error</span>')
					{
						bootbox.alert("Cannot Delete", function(){});
					}
					else
					{
						$('#accordion').html(html);
						//$('#panel-697086').html(html);
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
	event.preventDefault();
	event.stopPropagation();
});



$(document).on('click', '#add-main-category1_reset', function (event)
{
	$('#add-main-category1_submit').css("display","none");
	$('#add-main-category1').val('');
	$('#hint1').html('Cannot be Empty').removeClass('green').addClass('red');
});

$(document).on('click', '#add-level2-category-reset', function (event)
{
	$('#add-level2-category-submit').css("display","none");
	$('#subcategory2').val('');
	$('#hint2').html('Cannot be Empty').removeClass('green').addClass('red');
});

$(document).on('click', '#add-level3-category-reset', function (event)
{
	$('#add-level3-category-submit').css("display","none");
	$('#sub-subcategory3').val('');
	$('#hint3').html('Cannot be Empty').removeClass('green').addClass('red');
});



//category-management.php - > tab1 content loading 
$(document).on('click', '.add_main_category', function (event)
{	
	$('#hint1').html('');
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/category-tree.php",
		async:false,
		data:{id:1},
		success:function(html)
		{
			//$('#panel-697082-tree').html('');
			$('#panel-697082-tree').html(html);
			$('.tree li:has(ul)').addClass('parent_li');
   			
			//TO DO put categorytree script	
			$('li.parent_li > span').each(function(index, element)
			{
				$(this).parent('li.parent_li').find(' > ul > li').hide('fast');   
			});
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
	
});

//category-management.php - > tab2  content loading 
$(document).on('click', '.add_sub_category', function (event)
{
	$('#subcategory2__').css("display","none");
	$('#lbl_subcategory2__').css("display","none");
	$('#hint2').html('');
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/category-tree.php",
		async:true,
		data:{id:2},
		success:function(html)
		{
			//$('#panel-697083-tree').html('');
			$('#panel-697083-tree').html(html);
			
			//TO DO put categorytree script	
			$('li.parent_li > span').each(function(index, element)
			{
				$(this).parent('li.parent_li').find(' > ul > li').hide('fast');   
			});	
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
	
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/main-category.php",
		async:true,
		data:{},
		success:function(html)
		{
			if(html=='<i></i>')
			{
				$('.maincategorydiv_2').css("display","none");
				//$('#lbl_maincategorydiv_2').css("display","none");
			}
			else
			{
				$('.maincategorydiv_2').html(html);
				$("#maincategory2").select2({
												placeholder: "-- Select Main Category --",
												allowClear: false,
												});
			}
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});

});

//category-management.php - > tab3 content loading 
$(document).on('click', '.add_sub_sub_category', function (event)
{
	//alert('!!!!!!!!');	
	$('#category3 #sub-subcategory3').css("display","none");
	$('#category3 #lbl_subsubcategory3').css("display","none");
	$('#hint3').html('');
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/category-tree.php",
		async:true,
		data:{id:3},
		success:function(html)
		{
			//$('#panel-697084-tree').html('');
			$('#panel-697084-tree').html(html);
			
			//TO DO put categorytree script	
			$('li.parent_li > span').each(function(index, element)
			{
				$(this).parent('li.parent_li').find(' > ul > li').hide('fast');   
			});
		
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"../admin/ajax/main-category.php",
		async:true,
		data:{},
		success:function(html)
		{
			if(html=='<i></i>')
			{
				$('#category3 .maincategorydiv_3').css("display","none");
				//$('#category3 #lbl_maincategorydiv_3').css("display","none");
				
			}
			else
			{
				$('.maincategorydiv_3').html(html);
				$(".maincategorydiv_3 #maincategory2").select2({
												placeholder: "-- Select Main Category --",
												allowClear: false,
												});
			}
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});
	
	
});


//category-management.php - > tab4  content loading 
$(document).on('click', '.category__management', function (event)
{
	//alert('category__management');
	
	$.ajax(
	{
		type: "POST",
		dataType:'html',
		url:"./ajax/category-accordian.php",
		async:true,
		data:{},
		success:function(html)
		{	
			$('#accordion').html(html);
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	});	

});




