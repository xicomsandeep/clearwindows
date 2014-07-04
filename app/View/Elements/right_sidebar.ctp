     <div class="right-bar">
                <div class="profilePic">
                    <a href="#" >
                        <figure><?php echo $this->Html->image('profile-pic.png'); ?></figure>
                        <span><?php echo $user_info['User']['username'];?></span>
                        <div class="clear"></div>
                    </a>                                       
                </div>
                <div class="events-log common-select">
                    <h4>Events Log</h4>
                    <select class="selectpicker">
                        <option>Live Filter</option>
                        <option>Live Filter</option>
                        <option>Live Filter</option>
                        <option>Live Filter</option>
                    </select>
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

                        </div>
                        <div class="tab-pane active" id="task">
                            <form>
                                <div class="form-group">
                                    <label for="inputEmail">Date - Time</label>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Description</label>
                                    <input type="text" class="form-control" id="inputPassword" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Schedule</label>
                                    <textarea  class="form-control" ></textarea>
                                </div>                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>                       
                    </div>
                </div>
            </div>