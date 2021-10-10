<a href="<?php echo site_url('member/documents/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Documents'); ?></h5>
<!--Data display of documents with id-->
<?php
$c = $documents;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Innovation Plan</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Innovation_plan_model');
$dataArr = $this->CI->Innovation_plan_model->get_innovation_plan($c['innovation_plan_id']);
echo $dataArr['weight_of_objectives'];
?>
									</td>
	</tr>

	<tr>
		<td>Document File Type</td>
		<td><?php echo $c['document_file_type']; ?></td>
	</tr>

	<tr>
		<td>File Picture</td>
		<td><?php
if (is_file(APPPATH . '../public/' . $c['file_picture']) && file_exists(APPPATH . '../public/' . $c['file_picture'])) {
    ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_picture']?>"
			class="picture_50x50">
										  <?php
} else {
    ?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg"
			class="picture_50x50">
										<?php
}
?>	
										</td>
	</tr>

	<tr>
		<td>Description</td>
		<td><?php echo $c['description']; ?></td>
	</tr>

	<tr>
		<td>Created At</td>
		<td><?php echo $c['created_at']; ?></td>
	</tr>

	<tr>
		<td>Updated At</td>
		<td><?php echo $c['updated_at']; ?></td>
	</tr>


</table>
<!--End of Data display of documents with id//-->
