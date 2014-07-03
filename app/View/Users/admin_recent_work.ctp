<div class="pages row">
    <div class="floatleft mtop10"><h1><?php echo __('%s\'s Recent Work', $user_data['User']['first_name']); ?></h1></div>
    <div class="floatright">
	<?php echo $this->Html->link('<span>' . __('Back To Manage Users') . '</span>', array ('controller' => 'users', 'action' => 'manage', 'admin' => true), array ('class' => 'black_btn', 'escape' => false)); ?>    </div>
</div>

<div align="center" class="whitebox mtop15 viewMode">

    <table cellspacing="2" cellpadding="7" border="0" align="center">
	<tr>
	    <td align="left">
	    	 <div class="recent-work">
	    	 	<?php foreach ( $recent_work as $work) : ?>	    	 	
                	<div class="col">
                        <div class="row mt5">
                            <div class="choose_file">
                                <strong>Upload Image</strong>
                               <?php
                               echo $this->Html->image(WORK_IMG . $work['UserWork']['photo'] , array('height' => '100', 'width' => '100') );
                               ?>
                            </div>
                            <a style="float:right" href="<?php echo $this->Html->url( WORK_IMG . $work['UserWork']['photo']) ?>" target="_blank">See original Image</a>                                
                        </div>
                        <div class="row">
                            <div class="inputtext mt5">
                            	<strong>Title : </strong>
                            	<?php echo $work['UserWork']['title'] ?>
                            </div>
                            <div class="inputtext mt5">
                            	<strong>Description : </strong>
                            	<?php echo $work['UserWork']['description'] ?>
                             </div>
                        </div>
                    </div>
                    <br>
                    
                <?php endforeach;?>
                
                </div>                
	    	
	    </td>
	</tr>

    </table>

</div>







