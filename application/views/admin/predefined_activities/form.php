<a  href="<?php echo site_url('admin/predefined_activities/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Predefined_activities'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/predefined_activities/save/'.$predefined_activities['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Activities Name" class="col-md-4 control-label">Activities Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="activities_name" value="<?php echo ($this->input->post('activities_name') ? $this->input->post('activities_name') : $predefined_activities['activities_name']); ?>" class="form-control" id="activities_name" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Description" class="col-md-4 control-label">Description</label> 
          <div class="col-md-8"> 
           <textarea  name="description"  id="description"  class="form-control" rows="4"/><?php echo ($this->input->post('description') ? $this->input->post('description') : $predefined_activities['description']); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Order No" class="col-md-4 control-label">Order No</label> 
          <div class="col-md-8"> 
           <input type="text" name="order_no" value="<?php echo ($this->input->post('order_no') ? $this->input->post('order_no') : $predefined_activities['order_no']); ?>" class="form-control" id="order_no" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($predefined_activities['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			