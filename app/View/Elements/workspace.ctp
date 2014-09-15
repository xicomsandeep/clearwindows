

 <style>
#sortable2 { list-style-type: none; margin: 0; padding: 0; width: 60%; }
#sortable2 li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
#sortable2 li span { position: absolute; margin-left: -1.3em; }
</style>
<script>
$(function() {
$( "#sortable2" ).sortable();
$( "#sortable2" ).disableSelection();
});
</script>
<?php echo $this->element('contacts');?>
<?php echo $this->element('jobs');?>
<?php echo $this->element('round');?>
<?php echo $this->element('account');?>
<?php echo $this->element('event');?>
<?php echo $this->element('task');?>