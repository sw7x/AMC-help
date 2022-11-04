// JavaScript Document
/*----- category slide toggle in pdf.php ----*/


$(".level1-category").click(function(event)
{
	event.stopPropagation();
	$(this).children(".level2-category").slideToggle("slow");
});


$(".level2-category").click(function(event)
{
	event.stopPropagation();
	$(this).children(".level3-category").slideToggle("slow");
});
