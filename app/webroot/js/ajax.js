//Purpose:Ajax form submission
//created on:2 july 2014
//Author:Abhishek Tripathi

$(document).ready(function(){
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
    
    
    //---------------------data binding-------------------------------------
    // bind view model to html   
   ko.applyBindings(viewModel);
   // bind search query to html
   viewModel.query.subscribe(viewModel.search);
   //get function for get data of customers
   data(); 
   
   $(".selectsearch").select2(); 
   //purpose:open modal window for contacts infomation
 });
  
  

//event on click user_info
$(function(){
     $( "#myModal_customer_info" ).on('shown.bs.modal', function(){
		    get_user_info();
		});
});

//---------------------------------------------knockout-------------------------------------
  var beers=[];
	function data(){
		   $.post(siteurl+'Customers/get_data',function(d){
		   var data=JSON.parse(d);
		   var parsed = JSON.parse(d);		  
		    	viewModel.name(parsed.list);
				   });
		    }
  var viewModel={
	name:ko.observable(),
	query: ko.observable(''),
	 
	incrementClickCounter:function(){
		data();
		},
	refreshdata:function(){
		intial_data();
		},
	search: function(value) {
		data_filter(value);
      }	
			
	};  

	function data_filter(value)
       {
	   $.post(siteurl+'Customers/get_data_filter',{keyword:value},function(d){
	   var data=JSON.parse(d);
	   var parsed = JSON.parse(d);		  
	    	viewModel.name(parsed.list);
			   });
	    }

 
		    
