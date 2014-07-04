
//Purpose:Ajax form submission
//created on:2 july 2014
//Author:Abhishek Tripathi

$(document).ready(function(){
	$('.asd').on('click',function(){
		alert('sdfsdf');
	  $( "#myModal_customer_info" ).modal('show');	
   
	});	
	
 $('#customer_info').validate(
    {
    			rules: {
				'data[Customer][mobile_no]': {
					required: true,
					number:true,
					minlength: 10,
					maxlength: 12
				},
				'data[Customer][telephone_no]': {
					required: true,
					number:true,
					minlength: 10,
					maxlength: 12
				},
			},
			messages: {
				'data[Customer][mobile_no]': "please enter valid mobile number",
				'data[Customer][telephone_no]': "please enter valid telephone	 number"
				
			},
        submitHandler: function(form){
            $('#customer_info').ajaxSubmit({
                success: function(d) {
                    var data=JSON.parse(d);
                    if(data.error==0)
                    {
                    	$('#customer_form_msg').removeClass('.error-msg').addClass('.success-msg').html(data.msg).show();
                        setTimeout($('#myModal').modal('hide'),10000);	
                    }  
                }
            });
        }
    });
//-------------------------customer note form----------------------------

 $('#customer_note').validate(
    {
    			
        submitHandler: function(form){
            $('#customer_note').ajaxSubmit({
                success: function(d) {
                    var data=JSON.parse(d);
                    if(data.error==0)
                    {
                    	get_user_info(data.list);
                    }  
                }
            });
        }
    });    
//---------------------data binding-------------------------------------
    // bind view model to html   
   ko.applyBindings(viewModel);
   // bind search query to html
   viewModel.query.subscribe(viewModel.search);
   //get function for get data of customers
   data(); 
   //get function for get job list 
   //get_job_list();
   
   $(".selectsearch").select2(); 
   //purpose:open modal window for contacts infomation
 
 
   
 });


//---------------------------------------------knockout-------------------------------------

	function data(){
		   $.post(siteurl+'Customers/get_data',function(d){
		   var data=JSON.parse(d);
		   var parsed = JSON.parse(d);		  
		    	viewModel.name(parsed.list);
				   });
		    }
// ------------------View model for data binding-------------------------------		    
  var viewModel={
	name:ko.observable(),
	query: ko.observable(''),
	user_info:ko.observable(),
	customer_job:ko.observable(),
	 
	incrementClickCounter:function(){
	 
		},
	refreshdata:function(){
		
		},
	search: function(value) {
		data_filter(value);
      },
    
    	
      
			
	};  
//Purpose:fetct data basis on fillter
//created by:Abhishek Tripathi
//created on:3 july 2014
	function data_filter(value)
       {
	   $.post(siteurl+'Customers/get_data_filter',{keyword:value},function(d){
	   var data=JSON.parse(d);
	   var parsed = JSON.parse(d);		  
	    	viewModel.name(parsed.list);
			   });
	    }
//Purpose:get customer detail 
//created by:Abhishek Tripathi
//created on:4 july 2014	
    function get_user_info(value)
    {
    	
	    $('#myModal_customer_info').modal('show'); 
        $.post(siteurl+'Customers/get_user_info',{id:value},function(d){
	     var data=JSON.parse(d);
	     var parsed = JSON.parse(d);		  
	     viewModel.user_info(parsed.list);
	     //-------------------------------------------
      	 $.post(siteurl+'Jobs/get_customer_job',{id:value},function(d){
		     var data=JSON.parse(d);
		     var parsed = JSON.parse(d);		  
		     viewModel.customer_job(parsed.list);
		   });
	     
			   });	
	   	   
     			   
    }  
//Purpose:get customer job list 
//created by:Abhishek Tripathi
//created on:4 july 2014	

   function get_job_list()
   {
   	   $.post(siteurl+'Jobs/get_job_list',function(d){
	   var data=JSON.parse(d);
	   var parsed = JSON.parse(d);		  
	    	viewModel.job(parsed.list);
			   });
   }  
   
   function remove_job(value1,value2){
   	 $.post(siteurl+'Jobs/delete_job',{job_id:value1,customer_id:value2},function(d){
	   var data=JSON.parse(d);
	   var parsed = JSON.parse(d);		  
	    	viewModel.customer_job(parsed.list);
			   });
   }     

 
		    
