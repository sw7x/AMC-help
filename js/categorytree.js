// JavaScript Document

$(document).on('click','.tree li.parent_li > span',function (e)
{	
	var children = $(this).parent('li.parent_li').find(' > ul > li');
	if (children.is(":visible"))
	{
		children.hide('fast');
	}
	else
	{
		children.show('fast');
	}
	e.stopPropagation();
});