
window.filecount_progress=0;

$(function(){

    var ul = $('#upload ul');

    $('#drop a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        //dropZone: '',
		dropZone: $('#drop'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data)
		{
			var file;
			var docname;
			var categoryid;
			var categoryidfinal;
			var upload_filename;
			var upload_docname;
			var filecount;
			//window.filecount_add += 1;
			
			
			upload_filename = data.files[0]['name'];
			
			//filecount = $('input[name=tpl]').get(0).files.length
			//alert(filecount);
			
			bootbox.prompt("Please enter document name for " + upload_filename, function(upload_docname)
			{
				if(upload_docname==null || upload_docname==undefined || upload_docname=='')
				{
					bootbox.alert('DOCUMENT NAME CANNOT BE EMPTY', function(){});
				}
				else
				{
					$('input[name=document_name_hidden]').val(upload_docname);
					
					
					//alert(upload_docname);
					
					var upload_userid = $('select[name=user_info]').val();
					//var subcategory =  $('input[name=document_name]').val();
					
					var cat1 = $('#category1').val();
					var cat2 = $('#category2').val();
					var cat3 = $('#category3').val();
					
					/*
					alert('category1 '+cat1);
					alert('category2 '+cat2);
					alert('category3 '+cat3);
					*/
					
					categoryidfinal = getcategoryid(cat1,cat2,cat3);
					//alert(categoryidfinal);
							
					//alert("Only .swf .jpg, and .jpeg is allowed.");
					if(data.files[0]['type'] != 'image/jpg' && data.files[0]['type'] != 'image/jpeg' && data.files[0]['type'] != 'application/x-shockwave-flash')
					{ 
						bootbox.alert("Only .swf .jpg, and .jpeg Are Allowed.", function(){});
						return; 
					}
					
					//no user select
					if(upload_userid == null || upload_userid ==undefined || upload_userid=='')
					{
						bootbox.alert("No User Select", function(){});
						return;	
					}
					
					//no choose main category choose category
					if(categoryidfinal==0)
					{
						bootbox.alert("Choose Category", function(){});
						return;		
					}
					//FILE EXTENSION
					if(upload_filename == null || upload_filename ==undefined || upload_filename=='')
					{
						bootbox.alert("File Name is Empty", function(){});
						return;	
					}
					
					//document name not exists 
					//file name not exsists
					
					console.log(data);
					
					/*alert('filename '+upload_filename);
					alert('docname '+upload_docname);	
					alert('uid '+upload_userid);
					*/
					
					$.ajax(
					{
						type: "POST",
						dataType:'json',
						url:"../admin/ajax/file_check.php",
						async:true,
						data:{filename : upload_filename,docname : upload_docname,userid : upload_userid, categoryid : categoryidfinal},
						success:function(ajaxdata)
						{
							//if(ajaxdata['doc_name'] == 'invalid'){bootbox.alert('Document Name Exist', function(){});return;}
							if(ajaxdata['filenamevalidity'] == 'invalid'){bootbox.alert('File Name Exist Already For This User', function(){});return;}
							if(ajaxdata['filecount'] == 'invalid'){bootbox.alert('File Limit Reached for User', function(){});return;}
							
							//var tpl = $('<li class="working"><input type="text" value="0" data-width="48" data-height="48"'+' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');
							var tpl = $('<tr class="working"><td class="filename"></td><td class="docname"></td><td class="size"></td><td class="status"></td><span></span></tr>');
							
							
							// Append the file name and file size
							//tpl.find('p').text('File Name - ' + data.files[0].name + ', Document Name - ' + upload_docname).append('<i>' + formatFileSize(data.files[0].size) + '</i>');
							tpl.find('td.filename').text(data.files[0].name);
							tpl.find('td.docname').text(upload_docname);
							tpl.find('td.size').text(formatFileSize(data.files[0].size));
				
							// Add the HTML to the UL element
							//data.context = tpl.appendTo(ul);
							//data.context = tpl.prependTo($('table#upload_doclist'));
							
							
							var tpl_h = $('<tr><th>filename</th><th>documentname</th><th>size</th><th>status</th></tr>');
											
							
							
							var tablerowCount = $('table#upload_doclist tbody tr').length;
							if(tablerowCount)
							{
								data.context = tpl.prependTo($('table#upload_doclist tbody'));
							}
							else
							{
								tpl_h.appendTo($('table#upload_doclist thead'));
								data.context = tpl.appendTo($('table#upload_doclist tbody'));
							}
							
							// Initialize the knob plugin
							//tpl.find('input').knob();
				
							// Listen for clicks on the cancel icon
							tpl.find('td.status').click(function()
							{
								if(tpl.hasClass('working'))
								{
									jqXHR.abort();
								}
				
								/*
								tpl.fadeOut(function()
								{
									tpl.remove();
								});
								*/
							});
			
							
							// Automatically upload the file once it is added to the queue
							var jqXHR = data.submit();
							//console.log(jqXHR);
						},
						error:function(request,errorType,errorMessage) 
						{
							alert ('error - '+errorType+'with message - '+errorMessage);
						}
					});
				}
				
				
			});
			

		},

        progress: function(e, data){

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('input').val(progress).change();

            if(progress == 100)
			{	
				
				uploadedAllFiles = data.originalFiles.length;
				window.filecount_progress++;
               	data.context.removeClass('working');
				
				if(uploadedAllFiles == window.filecount_progress)
				{
					bootbox.alert('All document uploaded successfully', function()
					{
						$('.upload_reset').css('display','block');
						window.filecount_progress=0;
					});
				}
				else
				{
					$('.upload_reset').css('display','none');
				}
            }
        },

        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');
			console.log('error');
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e){
        e.preventDefault();
		//alert('999');
    });

    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }
	
	//get final category id for inser to db 
	function getcategoryid(cat1,cat2,cat3)
	{
		if(cat1 == null || cat1 == undefined || cat1 ==0)
		{
			categoryid=0;
			return categoryid;
		}
		else
		{
			if(cat2 == null || cat2 == undefined || cat2 ==0)
			{
				categoryid = cat1;
			}
			else
			{
				if(cat3 == null || cat3 == undefined || cat3 ==0)
				{
					categoryid = cat2;
				}
				else
				{
					categoryid = cat3;
				}
			}
		}
		return categoryid;
	}
	
	
});