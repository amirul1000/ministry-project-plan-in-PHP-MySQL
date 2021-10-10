<a href="<?php echo site_url('admin/performance_indicators/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Performance_indicators'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/performance_indicators/save/'.$performance_indicators['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Activities" class="col-md-4 control-label">Activities</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Activities_model');
        $dataArr = $this->CI->Activities_model->get_all_activities();
        ?> 
          <select name="activities_id" id="activities_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($performance_indicators['activities_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['activities_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Unit" class="col-md-4 control-label">Unit</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('performance_indicators', 'unit');
        ?> 
           <select name="unit" id="unit" class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($performance_indicators['unit']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php
            }
            ?> 
           </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Wop Indicators" class="col-md-4 control-label">Wop
				Indicators</label>
			<div class="col-md-8">
				<input type="text" name="wop_indicators"
					value="<?php echo ($this->input->post('wop_indicators') ? $this->input->post('wop_indicators') : $performance_indicators['wop_indicators']); ?>"
					class="form-control" id="wop_indicators" />
			</div>
		</div>
		<div class="form-group">
			<label for="Order No" class="col-md-4 control-label">Order No</label>
			<div class="col-md-8">
				<input type="text" name="order_no"
					value="<?php echo ($this->input->post('order_no') ? $this->input->post('order_no') : $performance_indicators['order_no']); ?>"
					class="form-control" id="order_no" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($performance_indicators['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
