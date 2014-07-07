 <div class="left-bar">
                <a href="#" class="logo" ><?php echo $this->Html->image('logo.png'); ?></a>
                <div>
                    <ul class="nav navbar-defaul">
                        <li class="active"><a href="#" class="nav_baar" rel="contact">Contacts <i class="fa fa-envelope"></i></a></li>
                        <li><a href="#"  class="nav_baar" rel="job">Jobs <i class="fa fa-folder-open"></i></a></li>
                        <li><a href="#"  class="nav_baar" rel="round">Rounds <i  class="fa fa-share-alt-square"></i></a></li>
                        <li><a href="#"  class="nav_baar" rel="account">Accounts <i class="fa fa-desktop"></i></a></li>
                        <li><a href="#"  class="nav_baar" rel="event">Events <i class="fa fa-comment"></i></a></li>
                        <li><a href="#"  class="nav_baar" rel="schedule">Schedule <i class="fa fa-clock-o"></i></a></li>
                        <li><a href="#"  class="nav_baar" rel="report">Report <i></i></a></li>
                        <li><a href="#"  class="nav_baar" rel="task">Tasks <i  class="fa fa-th-list"></i></a></li>
                        <li><?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?></li>
                    </ul>
                </div>
            </div>