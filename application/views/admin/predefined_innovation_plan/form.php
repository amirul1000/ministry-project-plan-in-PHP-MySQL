<a
	href="<?php echo site_url('admin/predefined_innovation_plan/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Predefined_innovation_plan'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/predefined_innovation_plan/save/'.$predefined_innovation_plan['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Objectives" class="col-md-4 control-label">Objectives</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Objectives_model');
        $dataArr = $this->CI->Objectives_model->get_all_objectives();
        ?> 
          <select name="objectives_id" id="objectives_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($predefined_innovation_plan['objectives_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['financial_year']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Weight Of Objectives" class="col-md-4 control-label">Weight
				Of Objectives</label>
			<div class="col-md-8">
				<input type="text" name="weight_of_objectives"
					value="<?php echo ($this->input->post('weight_of_objectives') ? $this->input->post('weight_of_objectives') : $predefined_innovation_plan['weight_of_objectives']); ?>"
					class="form-control" id="weight_of_objectives" />
			</div>
		</div>
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
					<?php if($predefined_innovation_plan['activities_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['activities_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Performance Indicators" class="col-md-4 control-label">Performance
				Indicators</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Performance_indicators_model');
        $dataArr = $this->CI->Performance_indicators_model->get_all_performance_indicators();
        ?> 
          <select name="performance_indicators_id"
					id="performance_indicators_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($predefined_innovation_plan['performance_indicators_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['unit']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Unit" class="col-md-4 control-label">Unit</label>
			<div class="col-md-8">
				<input type="text" name="unit"
					value="<?php echo ($this->input->post('unit') ? $this->input->post('unit') : $predefined_innovation_plan['unit']); ?>"
					class="form-control" id="unit" />
			</div>
		</div>
		<div class="form-group">
			<label for="Wop Indicators" class="col-md-4 control-label">Wop
				Indicators</label>
			<div class="col-md-8">
				<input type="text" name="wop_indicators"
					value="<?php echo ($this->input->post('wop_indicators') ? $this->input->post('wop_indicators') : $predefined_innovation_plan['wop_indicators']); ?>"
					class="form-control" id="wop_indicators" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($predefined_innovation_plan['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
