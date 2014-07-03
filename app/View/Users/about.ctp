<style>
    .exhibition li:first-child .deleteExibition,.exhibition li:first-child .deleteMuseum{display:none;}
</style>
<script>
	function chk_video_type(obj)
	{
		var obj_val = $(obj).val();
		if(obj_val == '2')
		{
			$('#div_video_url').hide();
			$('#div_video_upload').show();
		}
		else
		{
			$('#div_video_url').show();
			$('#div_video_upload').hide();
		}
	}
</script>
<section class="dashboard">
    <div class="inner-container">
        
        <?php echo $this->element('left_sidebar'); ?>		

        <?php
        echo $this->Form->create('User', array('id' => 'userEditAboutMe', 'class' => 'formStyle', 'type' => 'file', 'multiple' => 'multiple'));
        ?>            
        <div class="dashboard-right right-sec form-format">
            <h2 class="main-heading">About me</h2>
            <?php echo $this->Xicom->display_errors($errors); ?> 
            <div class="row">
                <label>Academic History </label>
                <div class="textarea pb20">
                    <?php echo $this->Form->input('academic_history', array('type' => 'textarea', 'rows' => 2, 'cols' => 2, 'class' => ' ', 'label' => false, 'div' => false)); ?>
                </div>
            </div>          
            <div class="row">
                <label>Exhibition</label>
                <ul class="exhibition" id="exhibition">
                    <?php
                    $exhibition_data = unserialize($this->request->data['User']['exhibition']);
                    if (!empty($exhibition_data)) :
                        foreach ($exhibition_data['date'] as $k => $v) :
                            ?>
                            <li class="even">

                                <div class="selectarea">
                                    <select name="data[User][exhibition][date][]">
                                        <?php
                                        foreach (range(date("Y"), 1910) as $year) :
                                            $selected_option = ($year == $v) ? "selected = true" : '';
                                            echo "<option value=\"$year\" $selected_option>$year</option>";
                                        endforeach;
                                        ?>
                                    </select>                    
                                </div>
                                <div class="inputtype">
                                    <input type="text" value="<?php echo $exhibition_data['title'][$k] ?>"  name="data[User][exhibition][title][]" class=""/>
                                </div>
                                <div class="add_delate">
                                    <div class="delate_btn"><a href="javascript:void(0);" class="deleteExibition">Delete</a></div>
                                </div>  
                            </li> 
                            <?php
                        endforeach;
                    else:
                        ?>
                        <li class="even">
                            <div class="add_delate">
                                <div class="delate_btn"><a href="javascript:void(0);" class="deleteExibition">Delete</a></div>
                            </div>                    
                            <div class="selectarea">
                                <select name="data[User][exhibition][date][]">
                                    <?php
                                    foreach (range(date("Y"), 1910) as $year) :
                                        echo "<option value=\"$year\">$year</option>";
                                    endforeach;
                                    ?>
                                </select>                    
                            </div>
                            <div class="inputtype">
                                <input type="text" placeholder="The great new exhibition"  name="data[User][exhibition][title][]" class=""/>
                            </div>
                        </li> 
                    <?php
                    endif;
                    //pr($exhibition_data);
                    ?>
                    <li class="odd">
                        <div class="add_delate fleft">
                            <div class="add_btn"><a href="javascript:void(0);" class="addExibition">+ Add</a></div>
                        </div>                    
                    </li>
                </ul>
            </div>
            <div class="row">
                <label>Museum History </label>
                <ul class="exhibition" id="museum">
                    <?php
                    $museum_history_data = unserialize($this->request->data['User']['museum_history']);
                    if (!empty($museum_history_data)) :
                        foreach ($museum_history_data['date'] as $k => $v) :
                            ?>
                            <li class="even">

                                <div class="selectarea">
                                    <select name="data[User][museum_history][date][]">
                                        <?php
                                        foreach (range(date("Y"), 1910) as $year) :
                                            $selected_option = ($year == $v) ? "selected = true" : '';
                                            echo "<option value=\"$year\" $selected_option>$year</option>";
                                        endforeach;
                                        ?>
                                    </select>                    
                                </div>
                                <div class="inputtype">
                                    <input type="text" class="" value="<?php echo $museum_history_data['title'][$k] ?>"  name="data[User][museum_history][title][]"/>
                                </div>
                                <div class="add_delate">
                                    <div class="delate_btn"><a href="javascript:void(0);" class="deleteExibition">Delete</a></div>
                                </div> 
                            </li> 
                            <?php
                        endforeach;
                    else:
                        ?>
                        <li class="even">
                            <div class="selectarea">
                                <select name="data[User][museum_history][date][]">
                                    <?php
                                    foreach (range(date("Y"), 1910) as $year) :
                                        echo "<option value=\"$year\">$year</option>";
                                    endforeach;
                                    ?>
                                </select>

                            </div>
                            <div class="inputtype">
                                <input type="text" name="data[User][museum_history][title][]" class=""/>
                            </div>                    
                            <div class="add_delate">
                                <div class="delate_btn"><a href="javascript:void(0);" class="deleteMuseum">Delete</a></div>
                            </div>
                        </li>
                    <?php
                    endif;
                    ?>
                    <li class="odd">
                        <div class="add_delate fleft">
                            <div class="add_btn"><a href="javascript:void(0);" class="addMuseum">+ Add</a></div>
                        </div>
                    </li>
                </ul>
            </div>                       
            <div class="row">
                <label>Living Influences</label>
                <div class="textarea pb20">
                    <?php echo $this->Form->input('living_influences', array('type' => 'textarea', 'rows' => 2, 'cols' => 2, 'class' => ' ', 'label' => false, 'div' => false)); ?>
                </div>
            </div>
            <div class="row">
                <label>Past Influences</label>
                <div class="textarea pb20">
                    <?php echo $this->Form->input('past_influences', array('type' => 'textarea', 'rows' => 2, 'cols' => 2, 'class' => ' ', 'label' => false, 'div' => false)); ?>
                </div>
            </div>             
            <div class="row">
				<label>Video</label>
				<div class="checkOpt"><?php echo $this->Form->input('video_type', array('type'=>'radio', 'class' => 'required', 'options' => array('1' => 'Youtube/vimeo url', 'Upload'), 'default' => 1, 'legend' => false, 'div' => false, 'separator' => '</div><div class="checkOpt">', 'onclick' => 'chk_video_type(this)')); ?>
				</div>
				<div class="col" id="div_video_url" style="<?php echo (!(!empty($this->request->data['User']['video_type']) && $this->request->data['User']['video_type'] == '2')?'':'display:none;') ?>"><?php echo $this->Form->input('videourl', array('type' => 'text', 'class' => ' ', 'label' => false, 'div' => false)); ?></div>
                <div class="col" id="div_video_upload" style="<?php echo ((!empty($this->request->data['User']['video_type']) && $this->request->data['User']['video_type'] == '2')?'':'display:none;') ?>">
                    <div class="video-part">
                        <?php
                        if (!empty($this->request->data['User']['video_image'])) :
                            ?>
                            <figure>
                                <img src="<?php echo VIDEO_IMG . $this->request->data['User']['video_image'] ?>" width="518" height="273">
                            </figure>                           
                            <?php
                        endif;
                        ?>                 
                        <div class="choose_file">
                            <?php echo $this->Form->input('video', array('type' => 'file', 'label' => false, 'div' => false)) ?>
                            <br/><span>(File size must be less than 20 mb)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="submitButtonBox">
                    <?php echo $this->Form->submit('Save Changes', array('class' => 'loginbtn reg ', 'label' => false, 'div' => false)); ?>
                </div>
            </div>            

        </div>
        <?php echo $this->Form->end(); ?>              

    </div>
</section>

<script>
    $(document).ready(function(){
        $("#userEditAboutMe").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });
        $('body').on('click', '.deleteExibition, .deleteMuseum', function() {
            $(this).closest('.even').remove();
        });
        $('.addExibition').click(function() {
            var html = $("#exhibition li:first").html();
            $("#exhibition li:last").before("<li class='even'>" + html + "</li>");
            $("#exhibition li:nth-last-child(2)").find('input[name="data[User][exhibition][title][]"]').val();
            $("#exhibition li:nth-last-child(2)").find('input[name="data[User][exhibition][title][]"]').attr('value', '');
        });
        $('.addMuseum').click(function() {
            var html = $("#museum li:first").html();
            $("#museum li:last").before("<li class='even'>" + html + "</li>");
            $("#museum li:nth-last-child(2)").find('input[name="data[User][museum_history][title][]"]').val();
            $("#museum li:nth-last-child(2)").find('input[name="data[User][museum_history][title][]"]').attr('value', '');
        });
    });

</script>
