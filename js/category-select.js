$('#category1').on('change',function(e)
{
	/*$('.subcategory').html('');
	$('.sub-subcategory').html('');*/
	
	var categorylevel1 = $(this).val()
	
	$.ajax(
		{
			type: "POST",
			dataType:'html',
			url:"../admin/ajax/category-select.php",
			async:true,
			data:{categorylevel1 : categorylevel1,level : 1},
			success:function(html)
			{
				$('.subcategory').html(html);
				$('.subcategory').html(html);
				
				$("#category2").select2({
												
												allowClear: false,
												});
				
     			$('#category2').on('change',function(e)
				{
					
					var categorylevel2 = $(this).val()
					
					
					if(categorylevel2 == 0)
					{
						//alert('ddd');
						$('.sub-subcategory').html('');
					}
					else
					{
						
						$.ajax(
						{
							type: "POST",
							dataType:'html',
							url:"../admin/ajax/category-select.php",
							async:true,
							data:{categorylevel2 : categorylevel2,level : 2},
							success:function(html)
							{
								 $('.sub-subcategory').html('');
								 $('.sub-subcategory').html(html);
								 $("#category3").select2({
												
												allowClear: false,
												});
									
							},
							error:function(request,errorType,errorMessage) 
							{
								alert ('error - '+errorType+'with message - '+errorMessage);
							}
						});
					
					}
					
					
									
					
					
				});			
			},
			error:function(request,errorType,errorMessage) 
			{
				alert ('error - '+errorType+'with message - '+errorMessage);
			}
		});
	
});


