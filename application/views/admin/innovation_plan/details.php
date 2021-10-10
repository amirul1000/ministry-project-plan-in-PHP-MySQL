<a href="<?php echo site_url('admin/innovation_plan/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Innovation_plan'); ?></h5>
<!--Data display of innovation_plan with id-->
<?php
$c = $innovation_plan;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Users</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Users_model');
$dataArr = $this->CI->Users_model->get_users($c['users_id']);
echo $dataArr['email'];
?>
									</td>
	</tr>

	<tr>
		<td>Objectives</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Objectives_model');
$dataArr = $this->CI->Objectives_model->get_objectives($c['objectives_id']);
echo $dataArr['financial_year'];
?>
									</td>
	</tr>

	<tr>
		<td>Weight Of Objectives</td>
		<td><?php echo $c['weight_of_objectives']; ?></td>
	</tr>

	<tr>
		<td>Activities</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Activities_model');
$dataArr = $this->CI->Activities_model->get_activities($c['activities_id']);
echo $dataArr['activities_name'];
?>
									</td>
	</tr>

	<tr>
		<td>Performance Indicators</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Performance_indicators_model');
$dataArr = $this->CI->Performance_indicators_model->get_performance_indicators($c['performance_indicators_id']);
echo $dataArr['unit'];
?>
									</td>
	</tr>

	<tr>
		<td>Unit</td>
		<td><?php echo $c['unit']; ?></td>
	</tr>

	<tr>
		<td>Wop Indicators</td>
		<td><?php echo $c['wop_indicators']; ?></td>
	</tr>

	<tr>
		<td>1st</td>
		<td><?php echo $c['1st']; ?></td>
	</tr>

	<tr>
		<td>2nd</td>
		<td><?php echo $c['2nd']; ?></td>
	</tr>

	<tr>
		<td>3rd</td>
		<td><?php echo $c['3rd']; ?></td>
	</tr>

	<tr>
		<td>4th</td>
		<td><?php echo $c['4th']; ?></td>
	</tr>

	<tr>
		<td>5th</td>
		<td><?php echo $c['5th']; ?></td>
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
<!--End of Data display of innovation_plan with id//-->
