<a href="<?php echo site_url('admin/documents/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Documents'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/documents/save/'.$documents['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Innovation Plan" class="col-md-4 control-label">Innovation
				Plan</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Innovation_plan_model');
        $dataArr = $this->CI->Innovation_plan_model->get_all_innovation_plan();
        ?> 
          <select name="innovation_plan_id" id="innovation_plan_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($documents['innovation_plan_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['weight_of_objectives']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Document File Type" class="col-md-4 control-label">Document
				File Type</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('documents', 'document_file_type');
        ?> 
           <select name="document_file_type" id="document_file_type"
					class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($documents['document_file_type']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php
            }
            ?> 
           </select>
			</div>
		</div>
		<div class="form-group">
			<label for="File Picture" class="col-md-4 control-label">File Picture</label>
			<div class="col-md-8">
				<input type="file" name="file_picture" id="file_picture"
					value="<?php echo ($this->input->post('file_picture') ? $this->input->post('file_picture') : $documents['file_picture']); ?>"
					class="form-control-file" />
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
				<textarea name="description" id="description" class="form-control"
					rows="4" /><?php echo ($this->input->post('description') ? $this->input->post('description') : $documents['description']); ?></textarea>
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($documents['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
