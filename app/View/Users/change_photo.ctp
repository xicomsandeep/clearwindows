<div class="formStyle">
	<h2><?php echo __('Change Profile Photo')?></h2>
	<div class="userimage mtop10 uploadProfilePic">
		<img id="photo-img" src="<?php echo PROFILE_PHOTO_IMG .  MEDIUM . $image ?>" width="100%" />
		<div class="divClear"></div>
	</div>
	<div class="formBlock">		
		<div id="photo-btn" class="mbottom15">
			<input type="file" name="photo" id="photo" class="img-uploader" />
		</div>
		
		<form id="crop_image_form" action="<?php echo SITE_URL ?>users/crop_image" method="post">
			<div id="coordinate_input">
				<input type="hidden" id="x" name="x" />
				<input type="hidden" id="y" name="y" />
				<input type="hidden" id="w" name="w" />
				<input type="hidden" id="h" name="h" />
			</div>
			<input type="hidden" id="source_file" name="source_file" />
			<span id="crop_status" ></span>
			
            <input id="crop_save" name="save" type="submit" value="Save" class="submitBtn" style="margin-right:10px;"/>
            <input id = "cancel_img"  name="cancel" type="button" value="Cancel" class="submitBtn" />
			
		</form>
	</div>
	<div id="message"></div>
</div>
<script type="text/javascript">

$(document).ready(function(){	
// File uploading 
	$('.img-uploader').attr("accept", "image/jpeg").change(function () {
		// Validate filetype before uploading. Server-side must additionally validate the MIME-TYPE!
		var filetype = $(this).val().split(".");		
		filetype = filetype[filetype.length - 1].toLowerCase();
		
		if (".gif.jpg.jpeg.png".indexOf(filetype) == -1) 
		{
			$(this).val("");
			alert("Please check the format of your photo and try again. We support these photo formats: JPG, GIF and PNG.");
		} 
		else
		{
			
			input = this;
			var old_source = $('#'+input.id+'-img').attr('src');
			$('#'+input.id+'-img').attr('src',site_url+'images/loading.gif');
			$('#'+input.id+'-img').css({width: '53px', height: '31px'});
			var elm_id = input.id;
			//input.id = input.name = 'uploadfile';
			
			$('<form enctype="multipart/form-data" method="post" id="'+elm_id+'-frm"></form>').append(input).hide().appendTo('body').ajaxForm({
				url: site_url + 'users/upload_image',
				data: { imagename: input.id },
				success: function (data) {
					var dataObj = jQuery.parseJSON(data);
					if ( dataObj.error )
					{
						alert(dataObj.error);
						$('#'+elm_id+'-img').attr('src', old_source);
					
						$('#'+elm_id+'-btn').append(input);
						$('#'+elm_id+'-frm').remove();
					}
					else
					{
						$("#noteText").remove();
						$('#'+elm_id+'-img').attr('src', dataObj.file_temp_url);
						$('.jcrop-holder img').attr('src', dataObj.file_temp_url);
						//Change facebox popup position
						if ( dataObj.width > 1200 )
						{
							$(".uploadProfilePic").css({ 'max-width': '1200px', overflow: 'auto'});
						}
						if ( dataObj.height > 700 )
						{
							$(".uploadProfilePic").css({ 'max-height': '700px', overflow: 'auto'});
						}
						//Change facebox popup position
						 
						$('#photo-img, .jcrop-holder, .jcrop-holder img').css({width: dataObj.width, height: dataObj.height});
						$('#photo-img').Jcrop({
							minSize: [224,214],
							aspectRatio: 224/214,
							onSelect: updateCoordinates,
							onChange: updateCoordinates,
							onRelease: clearCoordinates
						});
						$('#source_file').val(dataObj.file_name);
						$('#crop_save').show();
						$('#facebox').css({ left:$(window).width() / 2 - ($('#facebox .popup').outerWidth() / 2) });
					}
				}
			}).submit();
		}
	});
 });
/**
 * updateCoords function to update the selected image coordinates
 * @param c object
 */
function updateCoordinates(crd)
{ 
	$('#x').val(crd.x);
	$('#y').val(crd.y);
	$('#w').val(crd.w);
	$('#h').val(crd.h);
};
/**
 * updateCoords function to update the selected image coordinates
 * @param c object
 */
function clearCoordinates()
{
	$('#coordinate_input input').val('');
};


 $(document).ready(function(){
	$(document).bind('close.facebox', function(event) {
		bind_close_crop();
	});
	
	$('#crop_save').hide();
	$('#crop_image_form').ajaxForm({
		beforeSubmit: function(){
			$('#crop_save').hide();
			$('#crop_status').html('<img src="'+site_url+'images/loading.gif" />');
			if ( !parseInt($('#w').val()))
			{
				alert('Please select a crop region then press save.');
				$('#crop_save').show();
				$('#crop_status').html('');
				return false;
			}
		},
		success: function (data) {
			var dataObj = jQuery.parseJSON(data);
			if ( dataObj.error )
			{
				alert(dataObj.error);
				$('#crop_save').show();
			}
			else
			{
				
				$('#crop_status').html('');
				$('#photo-img').attr('src', dataObj.photo_url);
				$('.jcrop-holder img').attr('src', dataObj.photo_url);
				$('#photo-img, .jcrop-holder, .jcrop-holder img').css({width: dataObj.width, height: dataObj.height});
				$('#message').html('Your profile photo has been updated successfully');
				$('#cancel_img').remove();
				$('#photo-img').css({visibility:'visible', display:'block'});
				$('.jcrop-holder').hide();
				$('#profile_image').attr('src','<?php echo PROFILE_PHOTO_IMG . SMALL ?>'+$('#source_file').val());
				$('#facebox').css({ left:$(window).width() / 2 - ($('#facebox .popup').outerWidth() / 2) });
			}
		}
	});
	
//Cancel the image
	$('#cancel_img').click(function(){
		jQuery(document).trigger('close.facebox');
		//bind_close_crop();
	});
});

function bind_close_crop()
{
	if ($('#source_file').val() != '' )
	{
		$.ajax({
		  url: site_url+"users/cancel_crop",
		  data: 'image='+$('#source_file').val(),
		  type:'post',
		  success: function(data){
			
		  }
		});
	}
}
</script>
<div class="divClear"></div>
