<a href="<?php echo site_url('admin/objectives/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Objectives'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/objectives/save/'.$objectives['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Department" class="col-md-4 control-label">Department</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Department_model');
        $dataArr = $this->CI->Department_model->get_all_department();
        ?> 
          <select name="department_id" id="department_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($objectives['department_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['department']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Financial Year" class="col-md-4 control-label">Financial
				Year</label>
			<div class="col-md-8">
				<input type="text" name="financial_year"
					value="<?php echo ($this->input->post('financial_year') ? $this->input->post('financial_year') : $objectives['financial_year']); ?>"
					class="form-control" id="financial_year" />
			</div>
		</div>
		<!--<div class="form-group"> 
          <label for="Sl No" class="col-md-4 control-label">Sl No</label> 
          <div class="col-md-8"> 
           <input type="text" name="sl_no" value="<?php echo ($this->input->post('sl_no') ? $this->input->post('sl_no') : $objectives['sl_no']); ?>" class="form-control" id="sl_no" /> 
          </div> 
           </div>-->
		<div class="form-group">
			<label for="Objectives Name" class="col-md-4 control-label">Objectives
				Name</label>
			<div class="col-md-8">
				<input type="text" name="objectives_name"
					value="<?php echo ($this->input->post('objectives_name') ? $this->input->post('objectives_name') : $objectives['objectives_name']); ?>"
					class="form-control" id="objectives_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Weight Of Objectives" class="col-md-4 control-label">Weight
				Of Objectives</label>
			<div class="col-md-8">
				<input type="text" name="weight_of_objectives"
					value="<?php echo ($this->input->post('weight_of_objectives') ? $this->input->post('weight_of_objectives') : $objectives['weight_of_objectives']); ?>"
					class="form-control" id="weight_of_objectives" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($objectives['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
