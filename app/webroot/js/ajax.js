//Purpose:Ajax form submission
//created on:2 july 2014
//Author:Abhishek Tripathi

$(document).ready(function() {
	$('.asd').on('click', function() {
		alert('sdfsdf');
		$("#myModal_customer_info").modal('show');

	});

	$('#customer_info').validate({
		rules : {
			'data[Customer][mobile_no]' : {
				required : true,
				number : true,
				minlength : 10,
				maxlength : 12
			},
			'data[Customer][telephone_no]' : {
				required : true,
				number : true,
				minlength : 10,
				maxlength : 12
			},
		},
		messages : {
			'data[Customer][mobile_no]' : "please enter valid mobile number",
			'data[Customer][telephone_no]' : "please enter valid telephone number"
        },
		submitHandler : function(form) {
			$('#customer_info').ajaxSubmit({
				success : function(d) {
					var data = JSON.parse(d);
					if (data.error == 0) {
						$('#customer_form_msg').removeClass('.error-msg').addClass('.success-msg').html(data.msg).show();
						setTimeout($('#myModal').modal('hide'), 10000);
					}
				}
			});
		}
	});
	//-------------------------customer note form----------------------------

	$('#customer_note').validate({

		submitHandler : function(form) {
			$('#customer_note').ajaxSubmit({
				success : function(d) {
					var data = JSON.parse(d);
					if (data.error == 0) {
						get_user_info(data.list);
					}
				}
			});
		}
	});

	//-------------------------Event information----------------------------

	$('#event_detail').validate({

		submitHandler : function(form) {
			$('#event_detail').ajaxSubmit({
				success : function(d) {
					var data = JSON.parse(d);
					if (data.error == 0) {
							events();
					}
				}
			});
		}
	});
	
	
	//-------------------------customer account form----------------------------

	$('#customer_account').validate({

		submitHandler : function(form) {
			$('#customer_account').ajaxSubmit({
				success : function(d) {
					var data = JSON.parse(d);
					if (data.error == 0) {
						customer_accounts(data.list);
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
	// bind event search query to html
	viewModel.event_query.subscribe(viewModel.event_search);
	//bind event log live search
    viewModel.event_log_query.subscribe(viewModel.event_log_search);
    // bind job list search
     viewModel.job_query.subscribe(viewModel.job_search);
	//get function for get data of customers
	data();
	//get function for get events
	events();
	//get funtion for all job list
	all_job_list();
	
	$(".selectsearch").select2();
	//purpose:open modal window for contacts infomation
	$('.datepicker').datepicker({
		format : "dd/mm/yyyy"
	});
	
	//------------------------side bar navigation selection-------------------------------------
	
	$('.nav_baar').on('click',function(){
	  	var section=$(this).attr('rel');
	  	$('.middle-sec').hide();
	  	$('.'+section+'_middle_section').show();
	})
		
	
	
});

//---------------------------------------------knockout-------------------------------------

function data() {
	$.post(siteurl + 'Customers/get_data', function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.name(parsed.list);
	});
}

// ------------------View model for data binding-------------------------------
var viewModel = {
	//---------------------contact section-----------------------------------------
	name : ko.observable(),
	query : ko.observable(''),
	user_info : ko.observable(),
	customer_job : ko.observable(),
	job_list : ko.observable(),
	event_log_query:ko.observable(),
    customer_account_list:ko.observable(),
    //-------------------------------event section---------------------------------
	events:ko.observable(),	
	event_log:ko.observable(),
	event_query:ko.observable(''),
	//--------------------------------job section----------------------------------
	all_job_list:ko.observable(),
    job_query:ko.observable(''),
    job_detail:ko.observable(),
	incrementClickCounter : function() {

	},
	refreshdata : function() {

	},
	search : function(value) {
		data_filter(value);
	},
	event_search : function(value) {
		event_filter(value);
	},
	event_log_search:function(value){
		event_log_filter(value);
	},
	job_search:function(value){
		job_list_filter(value);
	}
};
//Purpose:fetct data basis on fillter
//created by:Abhishek Tripathi
//created on:3 july 2014
function data_filter(value) {
	$.post(siteurl + 'Customers/get_data_filter', {
		keyword : value
	}, function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.name(parsed.list);
	});
}
//Purpose:get customer detail
//created by:Abhishek Tripathi
//created on:4 july 2014
function get_user_info(value) {

	$('#myModal_customer_info').modal('show');
	//$('#myTab a:first').tab('show');
	$.post(siteurl + 'Customers/get_user_info', {
		id : value
	}, function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.user_info(parsed.list);
		//-------------------------------------------
		$.post(siteurl + 'Jobs/get_customer_job', {
			id : value
		}, function(d) {
			var data = JSON.parse(d);
			var parsed = JSON.parse(d);
			viewModel.customer_job(parsed.list);
			//-------------------------------------------
				$.post(siteurl + 'Jobs/customer_job_list', {
					id : value
				}, function(d) {
					var data = JSON.parse(d);
					var parsed = JSON.parse(d);
					viewModel.job_list(parsed.list);
				});
		    //-------------------------------------------------		
                customer_accounts(value);
                
		});
		     
	});

}
//Purpose:get customer job list
//created by:Abhishek Tripathi
//created on:4 july 2014
function get_job_list() {
	$.post(siteurl + 'Jobs/get_job_list', function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.job(parsed.list);
	});
}

//Purpose:delete customer job
//created by:Abhishek Tripathi
//created on:4 july 2014
function remove_job(value1, value2) {
	$.post(siteurl + 'Jobs/delete_job', {
		job_id : value1,
		customer_id : value2
	}, function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.customer_job(parsed.list);
		get_user_info(value2);
	});
}
//Purpose:get customer accounts list
//created by:Abhishek Tripathi
//created on:7 july 2014
function customer_accounts(value){
	$.post(siteurl + 'Accounts/customer_accounts', {
	    customer_id : value
	}, function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.customer_account_list(parsed.list);
	});
}
//Purpose:delete customer account history
//created by:Abhishek Tripathi
//created on:7 july 2014
function remove_account_history(value1, value2) {
	$.post(siteurl + 'Accounts/delete_account', {
		account_id : value1,
		customer_id : value2
	}, function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.customer_account_list(parsed.list);
	});
}
//Purpose:get events list
//created by:Abhishek Tripathi
//created on:7 july 2014
function events(){
	$.post(siteurl + 'Events/event_list', function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.events(parsed.list);
		viewModel.event_log(parsed.list);
	});
	
}
//Purpose:get filtered event list
//created by:Abhishek Tripathi
//created on:7 july 2014
function event_filter(value){
	$.post(siteurl + 'Events/event_filter',{
		keyword:value
	}, function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.events(parsed.list);
	});
}
//Purpose:get event log filtered list
//created by:Abhishek Tripathi
//created on:7 july 2014
function event_log_filter(value){
	$.post(siteurl + 'Events/event_filter',{
		keyword:value
	}, function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.event_log(parsed.list);
	});
}
//Purpose:delete customer account history
//created by:Abhishek Tripathi
//created on:7 july 2014
function all_job_list(value){
	$.post(siteurl + 'Jobs/job_list',
	 function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.all_job_list(parsed.list);
	});
}
//Purpose:Job list filter
//created by:Abhishek Tripathi
//created on:7 july 2014
function job_list_filter(value){
	$.post(siteurl + 'Jobs/job_list_filter',{
		keyword:value
	},
	 function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.all_job_list(parsed.list);
	});
}
//Purpose:get job detail
//created by:Abhishek Tripathi
//created on:8 july 2014
function get_job_detail(value){
 	$('#myModal_job_detail').modal('show');
 	$.post(siteurl + 'Jobs/job_detail',{
		id:value
	},
	 function(d) {
		var data = JSON.parse(d);
		var parsed = JSON.parse(d);
		viewModel.job_detail(parsed.list);
	});
 	
 }
