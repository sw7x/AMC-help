// JavaScript Document


$(document).on('keyup', '#accordian-search', function (event)
{
	var n1,n2,n3,c1,c2,c3,searchvalue,category1text,category2text,category3text;
	var category3available,category2available;
	 
	//clear all addded classes
	$('.category1').each(function()
	{
		$(this).removeClass('highlight');
		$(this).closest('.panel.panel-default.stage1').find('.level1').removeClass('in');
		$(this).closest('.panel.panel-default.stage1').css('display','block');
	});
	
	
	$('.category2').each(function()
	{
		$(this).removeClass('highlight');
		$(this).closest('.panel.panel-default.stage2').find('.level2').removeClass('in');
		$(this).closest('.panel.panel-default.stage2').css('display','block');
	});
	
	
	$('.category3').each(function()
	{
		$(this).removeClass('highlight');
		$(this).closest('.panel.panel-default.stage3').find('.level3').removeClass('in');
		$(this).closest('.panel.panel-default.stage3').css('display','block');
	});
	
	searchvalue = $('#accordian-search').val();
	//alert(searchvalue);
	
	if(searchvalue=='')
	{
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
	
	}
	else
	{
		
		$('.category1').each(function()
		{
			categoryavailable = false;
			
			c1 = $(this)
			category1text = c1.html()
			n1 = (category1text.toLowerCase()).search(searchvalue.toLowerCase());
			
			if(n1==-1){}
			else
			{
				c1.addClass('highlight');
				categoryavailable = true;
			}	
			
			
			c1.closest('.panel.panel-default').find('.category2').each(function()
			{
				c2 = $(this);
				category2text = c2.html()
				n2 = (category2text.toLowerCase()).search(searchvalue.toLowerCase());
				
				if(n2==-1){}
				else
				{
					c1.closest('.panel.panel-default').find('.level1').addClass('in');
					c2.addClass('highlight');
					categoryavailable = true;
				}	
				
				c2.closest('.panel.panel-default').find('.category3').each(function()
				{
					c3 = $(this);
					category3text = c3.html();
					n3 = (category3text.toLowerCase()).search(searchvalue.toLowerCase());
					
					if(n3==-1)
					{
						
					}
					else
					{
						c1.closest('.panel.panel-default').find('.level1').addClass('in'); 
						c2.closest('.panel.panel-default').find('.level2').addClass('in');
						
						$(this).addClass('highlight');
						categoryavailable = true;
					}
					
				});/*---------category3---------*/ 
			
			});/*---------category2---------*/ 
			
			if((n1==-1 && n2==-1 && n3==-1) || categoryavailable == false)
			{
				c1.closest('.panel.panel-default.stage1').css("display","none");
			}
			
		});/*---------category1---------*/ 
		
		
	}/*---------end of else---------*/ 
	
	
	
	
	
	
});