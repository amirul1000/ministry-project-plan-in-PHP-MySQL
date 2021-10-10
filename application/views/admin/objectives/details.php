<a href="<?php echo site_url('admin/objectives/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Objectives'); ?></h5>
<!--Data display of objectives with id-->
<?php
$c = $objectives;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Department</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Department_model');
$dataArr = $this->CI->Department_model->get_department($c['department_id']);
echo $dataArr['department'];
?>
									</td>
	</tr>

	<tr>
		<td>Financial Year</td>
		<td><?php echo $c['financial_year']; ?></td>
	</tr>

	<tr>
		<td>Sl No</td>
		<td><?php echo $c['sl_no']; ?></td>
	</tr>

	<tr>
		<td>Objectives Name</td>
		<td><?php echo $c['objectives_name']; ?></td>
	</tr>

	<tr>
		<td>Weight Of Objectives</td>
		<td><?php echo $c['weight_of_objectives']; ?></td>
	</tr>


</table>
<!--End of Data display of objectives with id//-->
