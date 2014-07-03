
//function for validating the change password form
function validateChangePassword(){
	var err=0;
	if(document.frm_changePassword.old_password.value==false){	
		err=1;
		document.getElementById('err_old_password').innerHTML="Please enter old password";
	}else
	{
		document.getElementById('err_old_password').innerHTML="";
	}
	
	if(document.frm_changePassword.new_password.value==false){		
		err=1;
		document.getElementById('err_new_password').innerHTML="Please enter new password";
	}else{
		document.getElementById('err_new_password').innerHTML="";
	}
	
	if(document.frm_changePassword.confirm_password.value==false){		
		err=1;
		document.getElementById('err_confirm_password').innerHTML="Please enter confirm new password";
	}else{
		document.getElementById('err_confirm_password').innerHTML="";
	}
	
	if(document.frm_changePassword.confirm_password.value !="" && document.frm_changePassword.new_password.value!="")
	{
		if(document.frm_changePassword.confirm_password.value !=document.frm_changePassword.new_password.value){		
			err=1;
			document.getElementById('err_confirm_password').innerHTML="Please enter same password for both above fields";
		}else{
			document.getElementById('err_confirm_password').innerHTML="";
		}
	}
		
	if(err)
		return false;
	else
	{
		document.frm_changePassword.submit();
		return true;
	}
	
}

function CheckUserAction(frm)
{
	var err=0;
	var total=0;
	var data=document.getElementsByName('list[]');
	var frm_obj = document.getElementById('task').form;
	
	for(var i=0; i < data.length; i++){
		if(data[i].checked)
			total++;
	}
	
	if(total==0)
	{
		document.getElementById("err_status").innerHTML="Please select record";
		err=1;
	}
	else if(document.getElementById('task').value=="")
	{
		
		document.getElementById("err_status").innerHTML="Please select an action";
		err=1;
	}	

	if(!err && (document.getElementById('task').value).toLowerCase()=="delete")
	{
		var conf = confirm("Do you really want to delete?");
		if(!conf)
		{
			err=1;
			document.getElementById("err_status").innerHTML="";
		}
	}	
	if(err)
		return false;
		
}

function validate_chckbox_select(frm)
{
	var err=0;
	var total=0;
	var data=document.getElementsByName('list[]');
	
	for(var i=0; i < data.length; i++){
		if(data[i].checked)
			total++;
	}
	
	if(total==0)
	{
		document.getElementById("err_status").innerHTML="Please select record";
		err=1;
	}

	if(err)
		return false;
		
}
