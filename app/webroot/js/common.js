/**
* common javascript behaviar
*
*/


	$(document).ready(function() {
		$.validator.addMethod("adminusername",function(value,element)
		{
			return this.optional(element) || /^[a-zA-Z0-9]{5,16}$/i.test(value);
		},"Username are a-zA-Z0-9 5-16 characters");
	})

	function en_dis_obj(obj, action)
	{
		if(action == 'disable')
		{
			obj.attr('disabled', true);
		}
		else
		{
			obj.attr('disabled', false);
		}
	}

	function checkAll(chobj)
	{
		frm = chobj.form;
		for(var i=0; i<frm.elements.length; i++)
		{
			if(frm.elements[i].type == "checkbox" && frm.elements[i].name != "checkall")
			{
				frm.elements[i].checked = chobj.checked;
			}
		}
	}
 
	function error404()
	{
		alert('page not found');
	}

	charachter_counter = function (txt_box, nchr, txt_up_status, txt_up){
		$('#'+txt_box).keyup(function(){
			txt_val = $(this).val()
			txt_val_len = $(this).val().length;
			if(txt_val_len > nchr){
				//alert(txt_val_len)
				$(this).val(txt_val.substring(0, nchr));
				if(txt_up_status){
					$('#'+txt_up).text('0');
				}
				return;
			}
			if(txt_up_status)
				$('#'+txt_up).text(nchr-txt_val_len);
		});

		//code to update the values when the page loads
		var txtbox_obj = $('#'+txt_box);
		var txt_val = txtbox_obj.val()
		var txt_val_len = txtbox_obj.val().length;
		if(txt_val_len > nchr){
			txtbox_obj.val(txt_val.substring(0, nchr));
			if(txt_up_status)
				$('#'+txt_up).text('0');
			return;
		}
		if(txt_up_status)
			$('#'+txt_up).text(nchr-txt_val_len);
	}

	function page_overlay(val)
	{
		if(val == 'add')
		{
			if(!$('.cboxOverlay').length)
			{
				$('body').prepend('<div class="cboxOverlay"></div>');
				
			}
			else
			{
				$('.cboxOverlay').css('display', 'block');
			}
		}
		else
		{
			$('.cboxOverlay').remove();
		}
	}

	function close_popup()
	{
		parent.$.fn.colorbox.close();
	}
	
	function get_video_code(id, type, width, height)
	{
		if(type == 'vimeo')
		{
			return '<iframe src="http://player.vimeo.com/video/'+ id +'?title=0&amp;byline=0&amp;portrait=0" width="'+ width +'" height="'+ height +'" frameborder="0"></iframe>';
		}
		else if(type == 'youtube')
		{
			return '<object width="'+ width +'" height="'+ height +'"><param name="movie" value="http://www.youtube.com/v/'+ id +'&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'+ id +'&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="'+ width +'" height="'+ height +'"></embed></object>';
		}
	}

	//TO REFRESH THE PINS
	function refresh_pins()
	{
		//RUNNING THE MASONRY AGAIN ELSE CREATING THE PROBLEM
		var $container = $('.pin-cols-area');
		
		$container.masonry('reload');
	}


	function more_less(div_id, sh_type)
	{
		if(sh_type == 'less')
		{
			$('#' + div_id + '_more').hide();
			$('#' + div_id + '_less').show();
		}
		else
		{
			$('#' + div_id + '_more').show();
			$('#' + div_id + '_less').hide();
		}
		
		return false;
	}

	function nl2br (str) {   
		return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1<br />$2');
	}
	
	function br2nl (str) {   
		return str.replace(/<br\s*[\/]?>/gi,"\r");
	}

	function close_popup_cust()
	{
		$('.popup_cust').hide();
	}
