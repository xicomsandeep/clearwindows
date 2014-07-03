<?php echo $this->Html->script(array('jquery.media'), array('inline' => false)); ?>
<section id="contentCntr" class="aboutus">
    <section class="contentcenter">             
        <div class="profile-box">
             <?php
				if($this->params['controller'] == 'products')
				{
					echo $this->Html->link('&laquo; Back to detail page', array('controller' => 'products', 'action' => 'view', $row_pro['Product']['slug']), array('class' => 'back-link fright', 'escape' => false));
				}
           ?>
            <h2 class="pl0">Profile detail</h2>
          
            <div class="left-sec">
                <img src="<?php echo PROFILE_PHOTO_IMG . MEDIUM . $user_data['User']['photo'] ?>" width="224" height="214">
                <h5><?php echo $user_data['User']['first_name'] . " " . $user_data['User']['last_name']; ?></h5>
            </div>                    
            <div class="right-sec">
                <?php if (!empty($user_data['User']['general_summary'])) : ?>
                    <h4>General Summary </h4>
                    <p>
                        <?php
                        echo $user_data['User']['general_summary'];
                        ?> 
                    </p>
                <?php endif; ?>
                <?php if (!empty($user_data['User']['academic_history'])) : ?>
                    <h4>Academic History </h4>
                    <p>
                        <?php
                        echo $user_data['User']['academic_history'];
                        ?> 
                    </p>
                <?php endif; ?>
                <?php if (!empty($user_data['User']['exhibition'])) : ?>
                    <h3>Exhibition</h3>
                    <ul class="exhibition">
                        <?php
                        $exhibition_data = unserialize($user_data['User']['exhibition']);
                        if (!empty($exhibition_data)) :
                            $i = 0;
                            foreach ($exhibition_data['date'] as $k => $v) :
                                $i++;
                                $liClass = ($i % 2 == 0) ? "odd" : "even";
                                ?>	
                                <li class="<?php echo $liClass; ?>"><span><?php echo $v; ?>:</span> <p><?php echo $exhibition_data['title'][$k]; ?></p> </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                <?php endif; ?>
                <?php if (!empty($user_data['User']['museum_history'])) : ?>

                    <h3>Museum History</h3>
                    <ul class="exhibition">
                        <?php
                        $museum_history_data = unserialize($user_data['User']['museum_history']);
                        if (!empty($museum_history_data)) :
                            $i = 0;
                            foreach ($museum_history_data['date'] as $k => $v) :
                                $i++;
                                $liClass = ($i % 2 == 0) ? "odd" : "even";
                                ?>	
                                <li class="<?php echo $liClass; ?>"><span><?php echo $v; ?>:</span> <p><?php echo $museum_history_data['title'][$k]; ?></p> </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>

                <?php endif; ?>

                <div class="row">
                    <?php echo $this->element('latest_work', array('user_id' => $user_data['User']['id'])) ?>
                </div>
                <div class="row">
                    <?php echo $this->element('historic_work', array('user_id' => $user_data['User']['id'])) ?>		     
                </div>
			<?php
				if($user_data['User']['video_type'] == 1 && !empty($user_data['User']['videourl']))
				{
			?>
                <div class="row">
                    <div class="col">
						<h3>Video</h3>
						<div class="video-part">
							<figure><?php echo getvideo_code($user_data['User']['videourl']); ?></figure>
						</div>
                    </div>
                </div>
			<?php
				}
				elseif($user_data['User']['video_type'] == 2 && !empty($user_data['User']['video']) && file_exists(VIDEO_DIR.$user_data['User']['video']))
				{
			?>
				<div class="row">
                    <div class="col">
                            <h3>Video</h3>
                            <div class="video-part">
                                <figure>
									<div><a href="<?php echo VIDEO_IMG.$user_data['User']['video'] ?>" class="playmedia {width:560, height:400}"></a></div>
									<script type = "text/javascript">
										$('document').ready(function(){
											$('a.playmedia').media();
										})
									</script>
                                </figure>
                            </div>
                    </div>
                </div>
			<?php
				}
			?>
                <?php if (!empty($user_data['User']['living_influences'])) : ?>
                    <h3>Living Influences</h3>
                    <p>
                        <?php
                        echo $user_data['User']['living_influences'];
                        ?> 
                    </p>
                <?php endif; ?>
                <?php if (!empty($user_data['User']['past_influences'])) : ?>
                    <h3>Past Influences</h3>
                    <p>
                        <?php
                        echo $user_data['User']['past_influences'];
                        ?> 
                    </p>
                <?php endif; ?>       
            </div>
        </div>    	

    </section>
    <div class="clear"></div>
</section>
