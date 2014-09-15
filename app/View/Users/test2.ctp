<?php echo $this->Html->script(array('knockout-sortable'));?>


        <ul data-bind="sortable:postion">
            <li data-bind="text:$data"></li>
        </ul>
