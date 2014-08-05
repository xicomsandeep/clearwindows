     <div class="right-bar">
                <div class="profilePic">
                    <a href="#" >
                        <figure><?php echo $this -> Html -> image('profile-pic.png'); ?></figure>
                        <span><?php echo $user_info['User']['username']; ?></span>
                        <div class="clear"></div>
                    </a>                                       
                </div>
                <div class="events-log common-select">
                    <h4>Events Log</h4>
                  <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="inputEmail" placeholder="keyword" type="event_log_search" class="form-control" data-bind="value: event_log_query, valueUpdate: 'keyup'" autocomplete="off" >
                                      <div class="list-group event_log_ui" data-bind="foreach: event_log" >
										  
										  <div href="#" class="list-group-item">
										  	<span  data-bind="text:event_type,click:function(){get_job_detail($data.job_id)} "></span>
										  	<span style="font-size: 10px; float:right;color:blue;" data-bind="text:customer_name ,click:function(){get_user_info($data.customer_id)}"></span>
										  </div>
										 
									</div>
                                </div>
                </div>
              
                <div class="right-tabing">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class=""><a href="#trans" role="tab" data-toggle="tab">Trans</a></li>
                        <li><a href="#note" role="tab" data-toggle="tab">Note</a></li>
                        <li class="active"><a href="#task" role="tab" data-toggle="tab">Task</a></li>                       
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane" id="trans">

                        </div>
                        <div class="tab-pane" id="note">
                              <?php echo $this->Form->create('Job',array('url'=>array('controller'=>'Jobs','action'=>'add'),'id'=>'qucik_note'))?>
                                <div class="form-group">
                                    <label for="inputEmail">Title</label>
                                    <input type="text" name="data[Job][subject]" class="form-control" id="inputEmail" >
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Links</label>
                                     <select name="data[Job][customer_id]"  class="selectsearch required" data-bind="options: customer_list, optionsText: 'first_name',optionsCaption: 'Select...', optionsValue: 'id'"></select>
                                </div>
                               <!-- <div class="form-group">
                                    <label for="inputPassword">Schedule</label>
                                    <textarea  class="form-control" ></textarea>
                                </div> -->                               
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane active" id="task">
                             <?php echo $this->Form->create('Job',array('url'=>array('controller'=>'Jobs','action'=>'add'),'id'=>'qucik_task'))?>
                                <div class="form-group">
                                    <label for="inputEmail">Title</label>
                                    <input type="text" name="data[Job][subject]" class="form-control" id="inputEmail" >
                                     <input type="hidden" name="data[Job][task]" value="1" class="form-control" id="inputEmail" >
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Links</label>
                                     <select name="data[Job][customer_id]"  class="selectsearch required" data-bind="options: customer_list, optionsText: 'first_name',optionsCaption: 'Select...', optionsValue: 'id'"></select>
                                </div>
                               <!-- <div class="form-group">
                                    <label for="inputPassword">Schedule</label>
                                    <textarea  class="form-control" ></textarea>
                                </div> -->                               
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>                       
                    </div>
                </div>
            </div>