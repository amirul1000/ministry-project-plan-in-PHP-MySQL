<a href="<?php echo site_url('admin/performance_indicators/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Performance_indicators'); ?></h5>
<!--Data display of performance_indicators with id-->
<?php
$c = $performance_indicators;
?>
<table class="table table-striped table-bordered">
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
		<td>Unit</td>
		<td><?php echo $c['unit']; ?></td>
	</tr>

	<tr>
		<td>Wop Indicators</td>
		<td><?php echo $c['wop_indicators']; ?></td>
	</tr>

	<tr>
		<td>Order No</td>
		<td><?php echo $c['order_no']; ?></td>
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
<!--End of Data display of performance_indicators with id//-->
