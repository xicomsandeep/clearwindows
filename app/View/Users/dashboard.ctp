 <script>
            $(document).ready(function() {
                $('.dropdown-toggle').dropdown();
                $('.selectpicker').selectpicker('selectAll');
            });
        </script>
        
<div class="container-fluid">            
            <?php echo $this->element('sidebar');?>
            <?php echo $this->element('workspace');?>
            <?php echo $this->element('footer');?>
            <?php echo $this->element('right_sidebar');?>  
          
       
        </div>