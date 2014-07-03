<div style="width:400px;" class="formStyle2">
  <div class="row">
    <h2><?php echo __('Approve User Account');?></h2>
  </div>
<div class="postReplyBox">
        <form id="popupApproval" method="post" onsubmit="return false;" class="inBlock">
            <div class="row">
             	<input type="hidden" name="id" value="<?php echo $user_id;?>" />
               <input type="hidden" name="action_type" value="<?php echo $action_type;?>" />
               Email content : <?php  echo $this->Form->input('description', array( 'type' => 'textarea','class' => 'input required','div' => false,'error' => true, 'label' => false, 'id' => 'description', 'style' => "width: 300px;height:150px;")); ?> 
            </div>
            <div class="row">
	            <input type="submit" name="approveAccount" id="approveAccount" value="Submit" class="blueBtn floatRight" />
            </div>
        </form>
    </div>    
	<div id="ajax-loader"></div>
</div>
<script type="text/javascript">
$('#approveAccount').click(function(){
		var description = jQuery.trim($("#description").val());
	
		if ( description == '')
		{
			alert("Please add description");
		}
		else
		{
			$('#updatePoint').attr('disabled', true);
			$('#ajax-loader').html('<img src="'+site_url+'images/loading.gif" />'); 
			$.ajax({
				type: "POST",
				url : site_url + "admin/users/account_action",
				data: $('#popupApproval').serialize(),
				cache: false,
				dataType: "html",
				success: function(data){
					dataObj = jQuery.parseJSON(data);
					if ( dataObj.error )
					{
						alert(dataObj.error);
					}
					else
					{ 
						jQuery.facebox('<div style="width:450px;" class="txtAlignC alertBox"><p class="bitBold28 mbottom15">'+ dataObj.success +'</p></div>');
					 	window.location.href = window.location.href;
					 }
				},
				statusCode: {
					404: function() {
						alert('page not found');
				}
				}
			});
		}
		return false;
	});
</script>