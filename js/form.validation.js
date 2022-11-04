

(function($)
{

    $.fn.extend({ 

        addTemporaryClass: function(className, duration)
		{
            var elements = this;
            setTimeout(function() 
			{
                elements.removeClass(className);
            }, duration);

            return this.each(function()
			{
                $(this).addClass(className);
            });
        }
    });

})(jQuery);


$.validator.addMethod("letters", function(value, element, params)
{
 re = new RegExp(/^[a-zA-Z]+$/);
 return this.optional(element) || re.test(value);
});


$.validator.addMethod("alphanumeric", function(value, element, params)
{
 re = new RegExp(/^[a-zA-Z0-9]+$/);
 return this.optional(element) || re.test(value);
});


$.validator.addMethod("numeric", function(value, element, params)
{
 re = new RegExp(/^[0-9]+$/);
 return this.optional(element) || re.test(value);
});


$(document).on('click','.updateid', function (event)
{
	
	var updateid = $(this).data('updateid');
	//alert(updateid);	
	//ajax request for get data
	
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/user_update.php",
		async:true,
		data:{updateid:updateid,task:'view'},
		success:function(data)
		{
			if(data['result']==true)
			{
				$('#edit').modal('show');
				
				$("select#countrylist").select2({placeholder: "Choose Country",allowClear: false,}).select2('val',data['country']); 
				$("select#sample_papers_").select2({allowClear: false}).select2('val',data['amc']); 
				
				$('#user_update input[name=fname]').val(data['firstname']);
				$('#user_update input[name=lname]').val(data['lastname']);
				$('#user_update input[name=email]').val(data['email']);
				$('#user_update input[name=username]').val(data['username']);
				$('#user_update input[name=tp_country]').val(data['tpcountry']); 
				$('#user_update input[name=tp_number]').val(data['tpnumber']);
				$('#user_update input[name=userid]').val(data['id']);
				$('#user_update input[name=userid]').val(data['id']);
				

				$('#user_update textarea[name=reglink]').val(data['reg_link']);
			}
			else
			{
				bootbox.alert("Cannot Connect to Database", function(){});
			}
			
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	
	});

	
	$("#user_update").validate(
	{
		rules:
		{
			fname : {required: true,letters:true,rangelength: [3, 20]},
			lname : {required: true,letters:true,rangelength: [3, 20]},
			email : {required: true,email:true},
			country : {required: true},
			//username : {required: true,alphanumeric:true,rangelength: [3, 40]},
			tp_number: {required: true,numeric:true,rangelength: [6,9]}
			
		},
		messages:
		{
			fname: {required: "Enter User's First name",letters:"Type Only a Character",rangelength:'Enter Characters Between 3 and 20'},
			lname : {required: "Enter User's Last name",letters:"Type Only a Character",rangelength:'Enter Characters Between 3 and 20'},
			email : {required: "Enter User's Email address",email:"Please Enter a Valid Email Address"},
			country : {required: "Enter User's Country",},
			//username : {required: "Enter User's Username",alphanumeric:"Type Only Numbers and Letters",rangelength:'Enter Characters Between 3 and 40'},
			tp_number: {required: "Enter Telephone 	Number ",numeric:"Only Numbers Valid",rangelength:"Incorect Telephone Number"}
		
		},
		submitHandler: function(form)
		{
			var firstname = $('input[name=fname]').val();
			var lastname = $('input[name=lname]').val();
			var email = $('input[name=email]').val();
			var country = $('select[name=country]').val();
			
			var tpcountry = $('input[name=tp_country]').val(); 
			var tpnumber = $('input[name=tp_number]').val();
			var userid = $('input[name=userid]').val();
			var username = $('input[name=username]').val();
			var amcv = $('select[name=sample_papers]').val();
			
			var emailinput = $('input[name=email]');
			
			//alert(firstname);
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/user_update.php",
				async:true,
				data:{	
						firstname : firstname,
						lastname : lastname,
						email : email,
						country : country,
						updateid : userid,
						tpnumber :tpnumber,
						tpcountry : tpcountry,
						task:'update',
						username:username,
						amcv:amcv
						
						},
				success:function(data)
				{
					if(data['result']=='success')
					{
						$('tr#row'+updateid+' td:nth-child(1)').html(data['userinfo']['firstname']);
						$('tr#row'+updateid+' td:nth-child(2)').html(data['userinfo']['lastname']);
						$('tr#row'+updateid+' td:nth-child(3)').html(data['userinfo']['email']);
						$('tr#row'+updateid+' td:nth-child(4)').html(data['userinfo']['username']);
						$('tr#row'+updateid+' td:nth-child(5)').html(data['userinfo']['tpcountry']+' '+data['userinfo']['tpnumber']);
						
						$('#edit').modal('hide');
						$('#updateuserfinish').modal('show');	
					}
					else if(data['result']=='exsists')
					{
						
						$('#updateuserexsists').modal('show');
						$('#edit').modal('hide');
						
					}
					else
					{
						//data['result']=='failed'
						$('#updateusererror').modal('show');	
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
		
			});
			
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
			error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}
	
	});
	
	
});



$(document).ready(function()
{
	   
	$("#user_create").validate(
	{	
		rules:
		{
			fname : {required: true,letters:true,rangelength: [3, 20]},
			lname : {required: true,letters:true,rangelength: [3, 20]},
			email : {required: true,email:true},
			country : {required: true},
			//username : {required: true,alphanumeric:true},
			tp_number: {required: true,numeric:true,rangelength: [6,9],}
			
		},
		messages:
		{
			fname: {required: "Enter User's First Name",letters:"Type Only Characters",rangelength:'Enter Characters Between 3 and 20'},
			lname : {required: "Enter User's Last Name",letters:"Type Only a Character",rangelength:'Enter Characters Between 3 and 20'},
			email : {required: "Enter User's Email Address",email:"Please Enter a Valid Email Address",},
			country : {required: "Enter User's Country",},
			//username : {required: "Enter User's Username",alphanumeric:"Type Only Numbers and Letters"},
			tp_number: {required: "Enter Telephone Number ",numeric:"Only Numbers Valid",rangelength:"Incorect Telephone Number",}
		
		},
		submitHandler: function(form)
		{
        	
			var firstname = $('input[name=fname]').val();
			var lastname = $('input[name=lname]').val();
			var email = $('input[name=email]').val();
			var country = $('select[name=country]').val();
			var username = $('input[name=username]').val();
			var tpcountry = $('input[name=tp_country]').val(); 
			var tpnumber = $('input[name=tp_number]').val();
			var amcv = $('select[name=sample_papers]').val();

			var random_code1 = Math.random().toString(16).substring(2,10);
			
			//alert(username);
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/insert_user.php",
				async:true,
				data:{	
						firstname : firstname,
						lastname : lastname,
						email : email,
						country : country,
						username : username,
						tpnumber :tpnumber,
						tpcountry : tpcountry,
						amcv : amcv,
						pwcode : random_code1
					},
				success:function(data)
				{
					// Insert the html into the page here using ".html(html)"
					//$('#result').html(html).addClass("green");
					
					
					if(data['result']=='success')
					{
						$('#adduserfinish').modal('show');
					}
					else if(data['result']=='exsists')
					{
						$('#adduserexsists').modal('show');
					}
					else
					{
						//data['result']='failed'
						$('#addusererror').modal('show');
					}
					
					
					
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});
			
			//clearinputs();
			//$('#user_create select[name=country]').val('AU');
			$('#user_create input[name=tp_country]').val(tpcountry); 
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}
	});
	
	
	//user name check
	$('#user_create input[name=email]').typing(
	{
    	start: function (event, $elem)
		{
        	//$elem.css('background', '#fa0');
			
    	},
    	stop: function (event, $elem)
		{
        	if(!$elem.valid())
			{
				$('#user_create input[name=username]').val('');
			}
			
			var usernameFromEmail = $('#user_create input[name=username]').val();
			//alert(usernameFromEmail);
			//console.log(usernameFromEmail)
			
			//$elem.css('background', '#f00');
			
			//$('#username-from-email').val('');
			var input_email= $elem.val();
			
			
			
			var emailarr;
			
			if($elem.valid()/* && usernameFromEmail==''*/)
			{
				
				var user_email = input_email.split("@"); 
				$('#username-from-email').val(user_email[0]);
				
				emailarr = user_email[0];
				
				$.ajax(
				{
					type: "POST",
					dataType:'json',
					url:"../admin/ajax/username-check.php",
					async:true,
					data:{input_username:user_email[0],task:'username'},
					success:function(data)
					{
						$('#username-from-email').val(data['successusername']);		
								
					},
					error:function(request,errorType,errorMessage) 
					{
						alert ('error - '+errorType+'with message - '+errorMessage);
					}
				});
			}
			/*else if($elem.valid() && usernameFromEmail!=='')
			{
				
				
				
				
			}
			*/
			
			
    	},
    	delay: 400
	
	});
	
	
	
	$("#register_email").validate(
	{
		rules:
		{
			reg_email : {required: true,email:true},
		
		},
		messages:
		{
			reg_email : {required: "Enter User's Email Address",email:"Please Enter a Valid Email Address",},
		},
		submitHandler: function(form)
		{
        	var email = $('input[name=reg_email]').val();
			//var country = $('input[name=reg_country]').val();
	
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"ajax/user_reg.php",
				async:true,
				data:{email : email,email_parameter : email_para,value:'email'},
				success:function(data)
				{
					
					if(data['result'] =='success')
					{
						var random_code1 = Math.random().toString(16).substring(2,10);
						$.ajax(
							{
								type: "POST",
								dataType:'json',
								url:"./ajax/regenerate_pass.php",
								async:true,
								data:{email : email_para,pwcode : random_code1},
								success:function(data)
								{
									if(data['result']==true)
									{
										//disable email enter  field
										//show password enter field
										$("#register_pass").css({'display':'block'});
										$("#resend_code").css({'display':'block'});
										$('input[name=reg_email]').val(email);
										$('input[name=reg_email]').attr('disabled','disabled');	
										$('input[name=reg_email_submit]').css({'display':'none'});	
										$('input[name=reg_email_cancel]').css({'display':'none'});	 
									}
									//else{}
								},
								error:function(request,errorType,errorMessage) 
								{
									alert ('error - '+errorType+'with message - '+errorMessage);
								}
							});		
							/*sus	generate random code,send random code through ajax,insert it to db,sms it,*/
					}
					else
					{
						$('.result_reg_email').html('');
						$('.result_reg_email').html('wrong email address');
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}

	});
	 
	$("#register_pass").validate(
	{
		rules:
		{
			reg_pass : {required: true,alphanumeric:true,rangelength: [8, 8],}
		},
		messages:
		{
			reg_pass : {required: "Enter User's Password",alphanumeric:"Type Only Numbers and Letters",rangelength:'Enter 8 Characters'}
		},
		submitHandler: function(form)
		{
        	var password = $('input[name=reg_pass]').val();
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"ajax/user_reg.php",
				async:true,
				data:{password : password,value : 'pass',email_parameter : email_para},
				success:function(data)
				{
					if(data['result'] =='success')
					{
						//registerd=cmVnaXN0ZXJk
						window.location.href = './index.php';
					}
					else
					{
						$('.result_reg_pass').html('');
						//$('.result_reg_pass').html('wrong password');
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					//<div class="result_reg_pass"></div>
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}

	});	
	
	
	
	$("#emergency1").validate(
	{
		rules:
		{
			emergency_email : {required: true,email:true,}
		},
		messages:
		{
			emergency_email : {required: "Enter a Email",emai:'Enter Email Addreess'}
		},
		submitHandler: function(form)
		{
        	var emergencyemail = $('input[name=emergency_email]').val();
			
			$.ajax({
					type: "POST",
					dataType:'json',
					url:"ajax/user_reg.php",
					async:true,
					data:{email:emergencyemail,value:'email',email_parameter : emergencyemail},
					success:function(data)
					{
						if(data['result'] == 'success')
						{
							
							var random_code2 = Math.random().toString(16).substring(2,10);
							$(".em-submit-message").css({'display':'block'});
							
							$.ajax(
							{
								type: "POST",
								dataType:'json',
								url:"./ajax/emergency-code.php",
								async:true,
								data:{email:emergencyemail,pwcode : random_code2},
								success:function(data)
								{
									if(data['result'] =='success')
									{
										//$("#register_pass").css({'display':'block'});
										
										$("#submit-emergency").css({'display':'block'});
										$('#request-emergency').css({'display':'none'});
										
										//$('input[name=emergency_email2]').attr('readonly', 'readonly');	
										//$('input[name=emergency_email2]').val(emergencyemail);
										
										$('input[name=emergency_email_submit]').css({'display':'none'});	
										$('input[name=emergency_email_cancel]').css({'display':'none'});
										
										
									}
									else
									{
										$('.result_emergency_email').html('wrong email');
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
							$('#emergencyEmailFaild').modal('show');
							
						}
					},
					error:function(request,errorType,errorMessage) 
					{
						alert ('error - '+errorType+'with message - '+errorMessage);
					}
				});		
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}

	});	/*end of validating emergency form*/
	
	
	
	
	$("#emergency2").validate(
	{
		rules:
		{
			emergency_email2 : {required: true,email:true,},
            emergency_pass : {required: true,alphanumeric:true,rangelength: [8, 8],}
			
		},
		messages:
		{
			emergency_email : {required: "Enter a Email",email:'Enter Email Addreess'},
			emergency_pass : {required: "Enter a Emergency Code",alphanumeric:"Letters and Numbers Only",rangelength:"Code Should be 8 Characters Long",}
		},
		submitHandler: function(form)
		{
        	var emergencyemail = $('input[name=emergency_email2]').val();
			var emergencyecode = $('input[name=emergency_pass]').val();
			
			$.ajax({
					type: "POST",
					dataType:'json',
					url:"./ajax/emergency-login.php",
					async:true,
					data:{email:emergencyemail,emergency_pass:emergencyecode},
					success:function(data)
					{
						if(data['feedback'])
						{
							
							window.location.href = './pdf.php';
						}
						else
						{
							
							
						}
					},
					error:function(request,errorType,errorMessage) 
					{
						alert ('error - '+errorType+'with message - '+errorMessage);
					}
				});		
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}

	});	/*end of validating emergency form*/
	
	
	
	$("#user_help_form").validate(
	{
		rules:
		{
			help_email : {required: true,email:true},
			help_comment:{required: true},
		},
		messages:
		{
			help_email : {required: "Enter User's Email Address",email:"Please Enter a Valid Email Address",},
			help_comment:{required: "Enter Your Comments"},
		},
		submitHandler: function(form)
		{
			//get data 
			if($("#user_help_form").valid())
			{
				var helpemail = $('#user_help_form input[name=help_email]').val();
				var comment = $('#user_help_form textarea[name=help_comment]').val();
				var userid = $('#user_help_form input[name=help_userid]').val();
				
				//alert(helpemail);
				//alert(comment);
				//alert(userid);
				
				$.ajax(
				{
					type: "POST",
					dataType:'json',
					url:"./ajax/comment-insert.php",
					async:true,
					data:{comment:comment,help_email:helpemail,userid:userid},
					success:function(data)
					{
						if(data['result']==true)
						{
							$('#modal-container-857151').modal('show');
							$('#user_help_form input[name=help_email]').val('');
							$('#user_help_form textarea[name=help_comment]').val('');
							$('#modal-container-857150').modal('hide');
						}
						else
						{
							$('#modal-container-857150').modal('hide');
							$('#modal-container-857152').modal('show');
						}
					},
					error:function(request,errorType,errorMessage) 
					{
						alert ('error - '+errorType+'with message - '+errorMessage);
					}
				
					
				});
				//$('#modal-container-857151').modal('hide')
				//return false;	
			}
			else
			{
			}
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}

	});
	
	
	$(".sampleAccountFormValidatorReset").click(function() {
    	sampleAccountFormValidator.resetForm();
	});
	
	var sampleAccountFormValidator =  $("#sample-account-form").validate({
		rules:
		{
			u_email : {required: true,email:true},
		},
		messages:
		{
			u_email : {required: "Enter User's Email Address",email:"Please Enter a Valid Email Address",},
		},
		submitHandler: function(form)
		{
        	var email = $('input[name=sample_acc_email]').val();
			var email_para = $('input[name=email_para]').val();
			var amc_para = $('input[name=amc_para]').val();
			
			//alert(email_para);
			//alert(email);
			
			if(typeof email_para=='undefined' || email_para==null)
			{
				email_para='';
				$('.result__pass').html('Invalid Email');
				//todo
			}
			
			if( amc_para !='amc1' && amc_para !='amc2')
			{
				amc_para='';
				$('.result__pass').html('Invalid Link');
				//todo
			}
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"ajax/user-login.php",
				async:true,
				data:{
					email : email,
					value :'sample_account',
					email_para :email_para,
					amc_para : amc_para
				},
				success:function(data)
				{
					
					$("#navbar-message").html('');
					$("#navbar-message").html(data['message']);
					
					if(data['result'] =='success')
					{
						//registerd=cmVnaXN0ZXJk
						var rurl = data['redirect']
						window.location.href = './'+rurl+'?status=cmVnaXN0ZXJk';
					}
					else
					{
						$('.sample_login__email').html(data['message']);
						//$('.result__pass').html('wrong password');
						
					}

				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
					
				}
			});
			
			return false;
		},
		errorPlacement: function(error, element)
		{
			
			if (element.attr("name") == "sample_acc_email"){

	            $("#sample_acc_email_error_msg").html(error);
	            

	        }else{
	       		offset = element.offset();
           		error.insertAfter(element);
	        }


			error.css('color','red');
			error.css('fontSize','14px');
			error.css('fontWeight','bold');



		}

	});
	
	
	/**/

	$(".emailFormValidatorReset").click(function() {
    	emailFormValidator.resetForm();
	});
	
	var emailFormValidator = $("#user_email").validate(
	{
		rules:
		{
			u_email : {required: true,email:true},
		},
		messages:
		{
			u_email : {required: "Enter User's Email Address",email:"Please Enter a Valid Email Address",},
		},
		submitHandler: function(form)
		{
        	var email = $('input[name=u_email]').val();
			var email_para = $('input[name=email_para]').val();
			var amc_para = $('input[name=amc_para]').val();
			
			//alert(email_para);
			//alert(email);
			
			if(typeof email_para=='undefined' || email_para==null)
			{
				email_para='';
			}
			
			if(typeof amc_para=='undefined' || email_para==null)
			{
				amc_para='';
			}
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"ajax/user-login.php",
				async:true,
				data:{email : email,value:'email',email_para:email_para,},
				success:function(data)
				{
					
					if(data['result'] == 'success'){
					
						$('.result__email').html('');
						//var random_code1 = Math.random().toString(16).substring(2,10);
						
						$("#user_pass").css({'display':'block'});
						
						$('input[name=u_email]').val(email);
						$('input[name=u_email]').attr('readonly', 'readonly');		
						
						
						$('.from-btn-wrap.top-form').css({'display':'none'});	
						$('.top-form.login-form').css({"padding-bottom" : "0px"});

					}else{
						
						
						$('.result__email').html('Invalid Email');

					}


					//alert('<<<<<<<<<<<<<>>>>>>>>>'+amc_para);
					
					//$("#navbar-message").html('');
					//$("#navbar-message").html(data['message']);
					
					
					




				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
					
				}
			});
			
			return false;
		},
		errorPlacement: function(error, element)
		{
			if (element.attr("name") == "u_email"){

	            $("#login_email_error_msg").html(error);
	            

	        }else{
	       		offset = element.offset();
           		error.insertAfter(element);
	        }


			error.css('color','red');
			error.css('fontSize','14px');
			error.css('fontWeight','bold');
		}

	});
	 


	$(".passFormValidatorReset").click(function() {
    	passFormValidator.resetForm();
	});
	
	var passFormValidator = $("#user_pass").validate(
	{
		rules:
		{
			u_pass : {required: true,alphanumeric:true,rangelength: [8, 8],}
		},
		messages:
		{
			u_pass : {required: "Enter User's Password",alphanumeric:"Type Only Numbers and Letters",rangelength:'Enter 8 Characters'}
		},
		submitHandler: function(form)
		{
        	var password = $('input[name=u_pass]').val();
			var email = $('input[name=u_email]').val();
			var amc_para = $('input[name=amc_para]').val();
			
			
			if(amc_para=='' || typeof amc_para=='undefined')
			{
				
				$.ajax(
				{
					type: "POST",
					dataType:'json',
					url:"ajax/user-login.php",
					async:true,
					data:{password : password,value : 'pass',email:email},
					success:function(data)
					{
						//$("#navbar-message").html('');
						//$("#navbar-message").html(data['message']);
						
						if(data['result'] =='success')
						{
							//registerd=cmVnaXN0ZXJk
							var rurl = data['redirect']
							window.location.href = './'+rurl+'?status=cmVnaXN0ZXJk';
						}
						else
						{
							//$('.result__pass').html('');
							$('.result__pass').html('wrong password');
							
						}
					},
					error:function(request,errorType,errorMessage) 
					{
						//<div class="result_reg_pass"></div>
						alert ('error - '+errorType+'with message - '+errorMessage);
					}
				});
			}
			else if(amc_para=='amc1' || amc_para=='amc2')
			{
				
				$.ajax(
				{
					type: "POST",
					dataType:'json',
					url:"ajax/user-login.php",
					async:true,
					data:{password : password,value : 'amcpass',email:email,amc:amc_para},
					success:function(data)
					{
						$("#navbar-message").html('');
						$("#navbar-message").html(data['message']);
						
						if(data['result'] =='success')
						{
							//registerd=cmVnaXN0ZXJk
							//var rurl = data['redirect']
							//window.location.href = './'+rurl+'?status=cmVnaXN0ZXJk';
							window.location.href = './pdf.php';
						}
						else
						{
							$('.result__pass').html('');
							//$('.result__pass').html('wrong password');
							
						}
					},
					error:function(request,errorType,errorMessage) 
					{
						//<div class="result_reg_pass"></div>
						alert ('error - '+errorType+'with message - '+errorMessage);
					}
				});
				
			}
			else
			{
				
			}
			
			return false;
		},
		errorPlacement: function(error, element)
		{
			

			//

			if (element.attr("name") == "u_pass"){

	            $("#pw-error-msg").html(error);
	            $('#login-password-field').css({'margin-bottom':'0px'});
	        }else{
	       		offset = element.offset();
           		error.insertAfter(element);
	        }


			error.css('color','red');
			error.css('fontSize','14px');
			error.css('fontWeight','bold');
				//



		}

	});	
	
	
	/**/
	$("#category1").validate(
	{
		rules:
		{
			//addmaincategory1 : {required: true,letters:true,rangelength: [3, 10]},
			
		},
		messages:
		{
			//addmaincategory1 : {required: "Enter Main Category Name",letters:"Type Only a Name",rangelength:'Enter Characters Between 3 and 10'},
		},
		submitHandler: function(form)
		{
        	var maincatvalue = $('input[name=addmaincategory1]').val();
			
			
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/category_insert.php",
				async:true,
				data:{maincatvalue : maincatvalue,task:'task1'},
				success:function(data)
				{
					if(data['query1']==true)
					{
						$('#hint1').html('Successfully Inserted Main Category').removeClass('red').addClass("green");
						$('#add-main-category1_submit').css('display','none');
						$('#add-main-category1_reset').css('display','none');
						$('#add-main-category1').val('');
						
						
						$('.tree_1 li.parent_li.level1 > span').parent('li.parent_li.level1').find(' > ul > li').hide('fast');
						$('.tree_1 li.parent_li.level2 > span').parent('li.parent_li.level2').find(' > ul > li').hide('fast');									
						
						
						/*add main category to category tree*/
						var main_cat_html =	'<ul>'+
        										'<li class="level1 parent_li" data-categoryid="">'+
            										'<span class="category1'+maincatvalue+'">'+maincatvalue+'</span>'+
												'</li>'+
											'<ul>';
											
						$('.tree.well').prepend(main_cat_html);
						$('.category1'+maincatvalue).addTemporaryClass("hightlightGreen", 1000);
					
					}
					else
					{
						$('#hint1').html('Failed To Inserted Main Category').removeClass('red').addClass("red");
						
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});/**/
			
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}

	});


	$("#category2").validate(
	{
		rules:
		{
			//subcategory2 : {required: true,letters:true,rangelength: [3, 10]},
		},
		messages:
		{
			//addmaincategory1 : {required: "Enter Level 2 Sub Category Name",letters:"Type Only a Name",rangelength:'Enter Characters Between 3 and 10'},
		},
		submitHandler: function(form)
		{
        	var subcatvalue = $('input[name=subcategory2]').val();
			var maincatvalue = $('#maincategory2').val();
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/category_insert.php",
				async:true,
				data:{maincatvalue : maincatvalue,task:'task2',subcatvalue:subcatvalue},
				success:function(data)
				{
					if(data['query2']==true)
					{
						$('#hint2').html('Successfully Inserted Level 2 Category').removeClass('red').addClass("green");
						$('#add-level2-category-submit').css('display','none');
						$('#add-level2-category-reset').css('display','none');
						$('#subcategory2__').val('');
						
						/*hide all expanded */
						$('.tree_2 li.parent_li.level1 > span').parent('li.parent_li.level1').find(' > ul > li').hide('fast');
						$('.tree_2 li.parent_li.level2 > span').parent('li.parent_li.level2').find(' > ul > li').hide('fast');									
						
						
						//Move main category to top 
						var maincategoryul = $(".tree_2 ul").find("li.parent_li.level1[data-categoryid='" + maincatvalue +"']").parent();
						maincategoryul.prependTo('.tree_2');
						
						
						var subcathtml =	 '<ul>'+
                								'<li class="level2 parent_li" data-categoryid="'+data['id']+'" style="display: list-item;">'+
                									'<span class="category2'+subcatvalue+'">'+ subcatvalue +'</span>'+
												'</li>'+
											'</ul>';
						
						$('.tree_2 ul').find("li[data-categoryid='" + maincatvalue +"'] span").parent('li.parent_li').find(' > ul > li').show('fast');
						$(".tree_2 ul").find("li[data-categoryid='" + maincatvalue +"'] > span").after(subcathtml);
					
						$('.category2'+subcatvalue).addTemporaryClass("hightlightGreen", 1000);
					
					}
					else
					{
						$('#hint2').html('Failed To Inserted Level 2 Category').addClass("red");
						
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});/**/
			
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}

	});

	
	
	
	$("#category3").validate(
	{
		rules:
		{
			//subsubcategory3 : {required: true,letters:true,rangelength: [3, 10]},
		},
		messages:
		{
			//subsubcategory3 : {required: "enter Level 3 Sub Category Name",letters:"Type Only a Name",rangelength:'Enter Characters Between 3 and 10'},
		},
		submitHandler: function(form)
		{
        	var sub_subcatvalue = $('input[name=subsubcategory3]').val();
			var maincatvalue = $('#maincategory2').val();
			var subcatvalue = $('#subcategory3').val();
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/category_insert.php",
				async:true,
				data:{maincatvalue : maincatvalue,task:'task3',subcatvalue:subcatvalue,sub_subcatvalue:sub_subcatvalue},
				success:function(data)
				{
					
					if(data['query3']==true)
					{
						$('#hint3').html('Successfully Inserted Level 3 Category').removeClass('red').addClass("green");
						$('#add-level3-category-submit').css('display','none');
						$('#add-level3-category-reset').css('display','none');
						$('#sub-subcategory3').val('');
						
						
						/*hide all expanded */
						$('.tree_3 li.parent_li.level1 > span').parent('li.parent_li.level1').find(' > ul > li').hide('fast');
						$('.tree_3 li.parent_li.level2 > span').parent('li.parent_li.level2').find(' > ul > li').hide('fast');
						
						var maincategoryul = $(".tree_3 ul").find("li.parent_li.level1[data-categoryid='" + maincatvalue +"']").parent();
						var subcategoryul= $(".tree_3 ul").find("li.parent_li.level2[data-categoryid='" + subcatvalue +"']").parent();
						var maincategoryli = $(".tree_3 ul").find("li.parent_li.level1[data-categoryid='" + maincatvalue +"']");
						var subcategoryli= $(".tree_3 ul").find("li.parent_li.level2[data-categoryid='" + subcatvalue +"']");
						var maincategorylispan = $(".tree_3 ul").find("li.parent_li.level1[data-categoryid='" + maincatvalue +"'] > span");
						var subcategorylispan= $(".tree_3 ul").find("li.parent_li.level2[data-categoryid='" + subcatvalue +"'] > span");
						
						/* Move main category to top */
						maincategoryul.prependTo('.tree_3');
						
						/* Move sub category to top of maincategory */
						maincategorylispan.after(subcategoryul);
						
						
						$('.tree_3 ul').find("li[data-categoryid='" + maincatvalue +"'] span").parent('li.parent_li').find(' > ul > li').show('fast')
						
						var sub_sub_cathtml =	 '<ul>'+
													'<li class="level3" data-categoryid="">'+
														'<span class="category3'+sub_subcatvalue+'">'+ sub_subcatvalue +'</span>'+
													'</li>'+
												'</ul>';
						   
						$(".tree_3 ul").find("li[data-categoryid='" + subcatvalue +"'] > span").after(sub_sub_cathtml);
						
						
						$('.tree_3 ul').find("li[data-categoryid='" + subcatvalue +"'] span").parent('li.parent_li').find(' > ul > li').show('fast')
						
						$('.category3'+sub_subcatvalue).addTemporaryClass("hightlightGreen", 1000);
						  
					}
					else
					{
						$('#hint3').html('Failed To Inserted Level 3 Category').addClass("red");
						
					}
					
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
			});/**/
			
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
           	error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}
	});
	
});/*end of document ready*/



$(document).on('click','.doc_rename', function (event)
{
	
	var updateid = $(this).data('docrenameid');
	//alert(updateid);	
	//ajax request for get data
	//console.log('$$$$$$$$$$$');
	
	$.ajax(
	{
		type: "POST",
		dataType:'json',
		url:"../admin/ajax/doc_update.php",
		async:true,
		data:{updateid:updateid,task:'view'},
		success:function(data)
		{
			if(data['result']==true)
			{
				$('#rename').modal('show');
				
				$('#doc_rename input[name=doc_filename]').val(data['filename']);
				$('#doc_rename input[name=doc_name]').val(data['docname']);
				$('#doc_rename input[name=doc_id]').val(data['docid']);
				$('#doc_rename input[name=user_id]').val(data['user_id']);
			}
			else
			{
				bootbox.alert("Cannot Connect to Database", function(){});
			}
			
		},
		error:function(request,errorType,errorMessage) 
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
	
	});

	
	$("#doc_rename").validate(
	{
		rules:
		{
			doc_name : {required: true,},
			doc_id: {required: true,},
			user_id: {required: true,},
		},
		messages:
		{
			doc_name: {required: "Enter Document Name",},
			doc_id : {required: "qqqqqqqqqq",},
			user_id : {required: "qqqqqqqqqq",},
		},
		submitHandler: function(form)
		{
			var docname = $('#doc_rename input[name=doc_name]').val();
			var docid = $('#doc_rename input[name=doc_id]').val();
			var userid = $('#doc_rename input[name=user_id]').val();
			
			
			/*alert(docname);
			alert(docid);
			alert(userid);*/
			
			$.ajax(
			{
				type: "POST",
				dataType:'json',
				url:"../admin/ajax/doc_update.php",
				async:true,
				data:{docname : docname,updateid : docid,task:'update',userid:userid},
				success:function(data)
				{
					if(data['result']=='success')
					{	      
						//$('#docmanagetable tr#docmanage_tr'+docid+' td:nth-child(3)').html(data['userinfo']['docname']);//////
						$('tr.doc__'+docid+' td:nth-child(1)').html(data['userinfo']['docname']);
						//$('tr#row'+updateid+' td:nth-child(2)').html(data['userinfo']['id']);
						//$('tr#row'+updateid+' td:nth-child(3)').html(data['userinfo']['userid']);
						
						$('#rename').modal('hide');
						$('#renamedocfinish').modal('show');
					}
					else if(data['result']=='exsists')
					{
						
						$('#renamedocexsists').modal('show');
						$('#rename').modal('hide');
					}
					else
					{	
						//data['result']=='failed'
						$('#renamedocerror').modal('show');
					}
				},
				error:function(request,errorType,errorMessage) 
				{
					alert ('error - '+errorType+'with message - '+errorMessage);
				}
		
			});/**/
			
			return false;
		},
		errorPlacement: function(error, element)
		{
			offset = element.offset();
			error.insertAfter(element);
			error.css('color','red');
			error.css('fontSize','12px');
		
		}
	
	});/**/
	
	
});